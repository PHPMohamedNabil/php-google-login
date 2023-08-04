<?php
//https://github.com/rakit/validation
namespace App\core\Validation;

use Rakit\Validation\Validator;
use App\Core\Url;
use App\Request;

class Validate{


    public static function validate(array $rules,$body,$json=null)
    {
        $validator = new Validator;

        $validation = $validator->validate($_POST + $_FILES,$rules);
      
        $errors = $validation->errors();
     	  

      if ($validation->fails())
      {
        
          if ($json)
          {
                return ['errors' => $errors->firstOfAll()];
          }
          else
          {
               
                
               return Url::backWith([
                                     'errors'=>$errors,
                                     'old'=> $body->getBody()
                                     ]);
          }

      }

      return true;
          

   }

   public static function customRule()
   {

   }

   public static function langFile()
   {

   }


	
}