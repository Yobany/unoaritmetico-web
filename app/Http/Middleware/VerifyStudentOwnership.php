<?php

namespace App\Http\Middleware;

use App\Repositories\StudentRepository;
use Closure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class VerifyStudentOwnership
{
    private $studentRepository;

    function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $student = $this->studentRepository->find($request->route()->parameter('studentId'));
        if(is_null($student)){
            throw new NotFoundHttpException("Student not found");
        }
        if($student->group_id != $request->route()->parameter('groupId')){
            throw new UnauthorizedHttpException("Student not found for group", "Student not found for user");
        }
        return $next($request);
    }
}
