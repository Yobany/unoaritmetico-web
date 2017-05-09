<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultRequest;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use App\Student;
use App\Transformers\StudentTransformer;
use Illuminate\Http\Response;


class StudentsController extends Controller
{
    private $service;

    function __construct(StudentService $studentService)
    {
        $this->service = $studentService;
    }

    /**
     * @SWG\Get(
     *     path="/students",
     *     summary="Obtains all students",
     *     tags={"Students"},
     *     description="Obtains all students",
     *     operationId="getStudents",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="page",
     *         in="query",
     *         type="integer",
     *         description="Page requested, default is 1",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="size",
     *         in="query",
     *         type="integer",
     *         description="Items per page, default is 10",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Search by name",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="group",
     *         in="query",
     *         type="integer",
     *         description="Search by group id",
     *         required=false
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Students created by user in the group",
     *          @SWG\Schema(ref="#/definitions/GetStudentsResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *    @SWG\Response(
     *         response=401,
     *         description="Token is invalid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function index(ConsultRequest $request)
    {
        return fractal($this->service->get($request), new StudentTransformer())->respond();
    }


    /**
     * @SWG\Post(
     *     path="/students",
     *     summary="Create a student",
     *     tags={"Students"},
     *     description="Create a student",
     *     operationId="storeStudent",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Student information",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/StoreStudentRequest")
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Account was registered",
     *         @SWG\Schema(ref="#/definitions/StoreStudentResponse")
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function store(CreateStudentRequest $request)
    {
        return fractal($this->service->save($request), new StudentTransformer())->respond();
    }

    /**
     * @SWG\Get(
     *     path="/students/{studentId}",
     *     summary="Display a single student",
     *     tags={"Students"},
     *     description="Display a single student",
     *     operationId="getGroups",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="studentId",
     *         in="path",
     *         description="Id of student to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Groups created by user",
     *          @SWG\Schema(ref="#/definitions/DetailStudentResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *    @SWG\Response(
     *         response=401,
     *         description="Token is invalid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     * @param Student $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        return fractal($student, new StudentTransformer())->respond();
    }


    /**
     * @SWG\Put(
     *     path="/students/{studentId}",
     *     summary="Update a student",
     *     tags={"Students"},
     *     description="Update a student",
     *     operationId="updateStudent",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Group to update",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/UpdateStudentRequest")
     *     ),
     *     @SWG\Parameter(
     *         name="studentId",
     *         in="path",
     *         description="Id of student to update",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Group was updated",
     *         @SWG\Schema(ref="#/definitions/UpdateStudentResponse")
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        return fractal($this->service->update($request, $student), new StudentTransformer())->respond();
    }

    /**
     * @SWG\Delete(
     *     path="/students/{studentId}",
     *     summary="Delete a student",
     *     tags={"Students"},
     *     description="Delete a student",
     *     operationId="deleteStudent",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="studentId",
     *         in="path",
     *         description="Id of student to delete",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="Group was deleted"
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function destroy(Student $student)
    {
        $this->service->delete($student);
        return response('' , Response::HTTP_NO_CONTENT);
    }
}
