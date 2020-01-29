<?php

namespace App\Controllers;

use \Firebase\JWT\JWT;
use Doctrine\ORM\EntityManager;
use App\Models\Doctrine;


class AccountController 
{
    private $em;
    private $jwtCredential;

    /**
     * Create new instance of Account controller
     * @param EntityManager $container : doctrine entity manager
     */
    public function __construct(EntityManager $container) 
    {
        $this->em = $container;
        $this->jwtCredential = "ANM_JWT_SECRET_4231";
    } 
    

    /**
     * Sign in
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : arguments
     * @return string (json)
     */
    public function SignIn($request, $response, $args) 
    {
        // get request datas
        $body = $request->getParsedBody();
        $login = $body["login"];
        $password = $body["password"];

        // check request datas
        if( !empty($login) && !empty($password) ) {
            
            $userRepository = $this->em->getRepository(\App\Models\Doctrine\UserTab::class);        
            
            // search matching user
            $user = $userRepository->findOneBy(array('email' => $login));            
                        
            if($user) {

                // check user password
                if(password_verify($password, $user->getPassword())) {

                    $issuedAt = time();
                    $expiration = $issuedAt + 60000;

                    $payload = array(
                        'userId' => $user->getUserId(),
                        'iat' => $issuedAt,
                        'exp' => $expiration
                    );

                    $token = JWT::encode($payload, $this->jwtCredential, "HS256");

                    return $response->withStatus(200)
                        ->withHeader("Authorization", "Bearer {$token}")
                        ->withHeader("Content-Type", "application/json")
                        ->write(json_encode(array(
                            'user' => $user->jsonSerialize(), 
                            "jwt" => $token
                        ), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));   
                        
                }                   
            }
        }

        // bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("message"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
    }

     /**
     * Sign up
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : arguments
     * @return string (json)
     */
    public function SignUp($request, $response, $args) 
    {
        // get request datas
        $body = $request->getParsedBody();
        
        $firstname = $body["firstname"];        
        $lastname = $body["lastname"];
        $password = $body["password"]; 
        $email = $body["email"];       
        $phone = $body["phone"];
        $streetno = $body["streetno"];
        $streetname = $body["streetname"];
        $city = $body["city"];
        $postalcode = $body["postalcode"];
        $country = $body["country"];
        $gender = $body["gender"];

        
        // check request datas
        if( !empty($firstname) && !empty($lastname) && !empty($password)
            && !empty($phone) && !empty($streetno) && !empty($streetname)
            && !empty($city) && !empty($postalcode) && !empty($country)
            && !empty($email) && !empty($gender)) 
        {
            if( !($this->UserAleardySignIn($email)) ){             

                // register new user
                $user = new \App\Models\Doctrine\UserTab();
                $user->setFirstname($firstname);
                $user->setLastname(strtoupper($lastname));
                $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
                $user->setEmail($email);
                $user->setPhone($phone);
                $user->setStreetno($streetno);
                $user->setStreetname($streetname);
                $user->setCity(strtoupper($city));
                $user->setPostalcode($postalcode);
                $user->setCountry(strtoupper($country));
                $user->setGender($gender);

                // asigne default user role
                $role = $this->getDefaultUserRole();
                $user->setRoleid($role);
                
                $this->em->persist($user);
                $this->em->flush();

                // define jwt content
                $issuedAt = time();
                $expiration = $issuedAt + 60000;

                $payload = array(
                    'userId' => $user->getUserId(),
                    'iat' => $issuedAt,
                    'exp' => $expiration,
                    'iss' => 'ECommerce backend'
                );

                $token = JWT::encode($payload, $this->jwtCredential, "HS256");

                return $response->withStatus(200)
                    ->withHeader("Authorization", "Bearer {$token}")
                    ->withHeader("Content-Type", "application/json")
                    ->write(json_encode(array(
                        'user' => $user->jsonSerialize(), 
                        "jwt" => $token
                    ), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
            }
        }

        // Bad Request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("message"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
    }

    /**
     * Delete user
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : arguments (id of user)
     * @return string (json)
     */
    public function DeleteUser($request, $response, $args) {

        $token = $request->getAttribute("decoded_jwt_token");

        if($token) 
        {
            $userid = $token->userId;

            // find user by id
            $userRepository = $this->em->getRepository(\App\Models\Doctrine\UserTab::class);
            $user = $userRepository->findOneBy(array('userid' => $userid));

            if($user)
            {
                // remove user
                $this->em->remove($user);
                $this->em->flush();
            
                return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode(array("message"=>"Succes"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
            }        
        }
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("message"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
    }

     /**
     * Update user
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : arguments (id of user)
     * @return string (json)
     */
    public function UpdateUser($request, $response, $args) {

        // get request datas
        $body = $request->getParsedBody();

        $firstname = $body["firstname"];        
        $lastname = $body["lastname"];
        $password = $body["password"];
        $email = $body["email"];       
        $phone = $body["phone"];
        $streetno = $body["streetno"];
        $streetname = $body["streetname"];
        $city = $body["city"];
        $postalcode = $body["postalcode"];
        $country = $body["country"];
        $gender = $body["gender"];

        // get jwt's content
        $token = $request->getAttribute("decoded_jwt_token");

        if($token) 
        {
            $userid = $token->userId;

            // find user by id
            $userRepository = $this->em->getRepository(\App\Models\Doctrine\UserTab::class);
            $user = $userRepository->findOneBy(array('userid' => $userid));
            
            if($user)
            {             
                // check request datas
                if (!empty($firstname) && !empty($lastname) && !empty($password)
                    && !empty($phone) && !empty($streetno) && !empty($streetname)
                    && !empty($city) && !empty($postalcode) && !empty($country)
                    && !empty($email) && !empty($gender)) 
                {           

                    // register new user
                    $user->setFirstname($firstname);
                    $user->setLastname($lastname);
                    $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
                    $user->setEmail($email);
                    $user->setPhone($phone);
                    $user->setStreetno($streetno);
                    $user->setStreetname($streetname);
                    $user->setCity($city);
                    $user->setPostalcode($postalcode);
                    $user->setCountry($country);
                    $user->setGender($gender);
                    
                    $this->em->persist($user);
                    $this->em->flush();

                    // get user informations
                    return $response->withStatus(200)
                        ->withHeader("Content-Type", "application/json")
                        ->write(json_encode($user->jsonSerialize()), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);
                }
            }
        }
        // Bad Request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("message"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
    }

    /**
     * Get user informations
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : null
     * @return string (json)
     */
    public function GetUserInformation($request, $response, $args) {

        // get jwt's content
        $token = $request->getAttribute("decoded_jwt_token");

        if ($token) {     

            $userid = $token->userId;

            // find user by id
            $userRepository = $this->em->getRepository(\App\Models\Doctrine\UserTab::class);  
            $user = $userRepository->findOneBy(array('userid' => $userid));

            if($user) {

                return $response->withStatus(200)
                    ->withHeader("Content-Type", "application/json")
                    ->write(json_encode($user->jsonSerialize(), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
            }
        }    

        // bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("message"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));

    }



     /**
     * Sign in
     * @param string $email
     * @return \App\Models\Doctrine\UserTab
     */
    private function UserAleardySignIn($email) {        
        $userRepository = $this->em->getRepository(\App\Models\Doctrine\UserTab::class);
        $user = $userRepository->findOneBy(array('email' => $email));

        return $user;
    }

    /**
     * Get default user role
     * @return \App\Models\Doctrine\RoleTab
     */
    private function getDefaultUserRole() {
        $roleRepository = $this->em->getRepository(\App\Models\Doctrine\RoleTab::class);
        $role = $roleRepository->findOneBy(array('code' => 3001));

        if($role){
            return $role;
        }

        $role = new \App\Models\Doctrine\RoleTab();
        $role->setTitle(strtoupper("Visiteur"));
        $roleRepository->persist($role);
        $roleRepository->flush();

        return $role;
    }
    
}

?>