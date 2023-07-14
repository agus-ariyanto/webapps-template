define(['ui/system/api','ui/system/iconlist'], function(){
    return ['$scope','$message','Api','IconList',function($scope,$message,Api,IconList){

        $scope.active=false;
        $scope.saved=false;

        $scope.data={
            image:IconList.img,
            cropped:''
        }

        var handleFileSelect=function(evt) {
            var file=evt.currentTarget.files[0];
            var reader = new FileReader();
            reader.onload = function (evt) {
              $scope.$apply(function($scope){
                $scope.data.image=evt.target.result;
              });
            };
            $scope.active=true;
            $scope.saved=false;
            reader.readAsDataURL(file);
          };

        angular.element(document.querySelector('#imagefile')).on('change',handleFileSelect);

        $scope.open=function(){
            document.getElementById('imagefile').click();
        }
        $scope.close=function(){
            $scope.active=false;
        }
        $scope.save=function(){
            $scope.saved=true;
            $scope.close();
        }
    
/* end controller */
}];
});