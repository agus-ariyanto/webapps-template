define(['ui/system/api'], function(){
    return ['$scope','$auth','$message','Api',function($scope,$auth,$message,Api){
    $scope.data={};
    
      $scope.masuk=function(){
          Api.Post('login',$scope.data)
          .then(function(r){
              if(!r.data.token) 
                    return $message.failed('salah username atau password');
               $auth.setToken(r.data.token);
              $auth.setUser(r.data.user);
              var a=$auth.user.grup_id;
              var b='';
              if(a==1) b='admin';
              if(a==2) b='office';
              if(a==3) b='poly';
              if(a==4) b='apoteker';
              window.location.href=alt.baseUrl+b;
        });
      }

    // $scope.init();

/*end controller*/
        }];
});
