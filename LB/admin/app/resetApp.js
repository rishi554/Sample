/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module("app", []);
app.controller("ResetController", function ($scope, $http, $rootScope) {
    $scope.Reset = true;
    $scope.ResetFormData = {};
    $scope.reset = function () {
        
        $http.post(
                "api/admin/reset.php",
                {'ResetFormData': $scope.ResetFormData}
        ).then(function successCallback(response) {
            if (response.data.Code === 200) {
                $("#ChangedMsg").fadeIn();
                $("#ChangedMsg").html("<div class='alert alert-success'><strong>Done !</strong> OTP is sent to Email Id.</div>");
                $("#ChangedMsg").fadeOut(4000);
                $scope.Reset = false;
                $scope.OTP = true;
            } else {
                $("#ResetMsg").fadeIn();
                $("#ResetMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Invalid Emaild Id.</div>");
                $("#ResetMsg").fadeOut(4000);
            }
        });
    };
    $scope.ResetFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.ResetForm.$valid) {
            $scope.UsernameRequired = false;
            return true;
        } else {
            if ($scope.ResetForm.Username.$invalid) {
                $scope.UsernameRequired = true;
            }
            return false;
        }
    };
    $scope.ChangePassword = function () {
        
        $http.post(
                "api/admin/ChangePassword.php",
                {'ResetFormData': $scope.ResetFormData}
        ).then(function successCallback(response) {
            if (response.data) {
                $("#ResetMsg").fadeIn();
                $("#ResetMsg").html("<div class='alert alert-success'><strong>Done !</strong> Password is sent to provided Email Id.</div>");
                $("#ResetMsg").fadeOut(4000);
                $scope.Reset = true;
                $scope.OTP = false;
            } else {
                $("#ChangedMsg").fadeIn();
                $("#ChangedMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Invalid Emaild Id.</div>");
                $("#ChangedMsg").fadeOut(4000);
            }
        });
    };
    $scope.ResetFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.ResetForm.$valid) {
            $scope.UsernameRequired = false;
            return true;
        } else {
            if ($scope.ResetForm.Username.$invalid) {
                $scope.UsernameRequired = true;
            }
            return false;
        }
    };
});


