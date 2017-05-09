<?php
/**
 * @SWG\SecurityScheme(
 *   securityDefinition="ApiAuth",
 *   type="oauth2",
 *   name="Authorization",
 *   tokenUrl="http://localhost/api/auth/token",
 *   flow="password",
 *   scopes={
 *     "read:users": "Consult userss",
 *     "write:users": "Modify users"
 *   }
 * )
 */