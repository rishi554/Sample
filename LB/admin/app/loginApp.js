
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('LoginApp', []);
app.controller('LoginController', function ($scope, $http) {
    $scope.init = function () { // Load data on page for first time
        $scope.CheckLogin();
    };
    $scope.LoginFormData = {};
    $scope.login = function () {
        $http.post(
                "api/admin/Login.php",
                {'LoginFormData': $scope.LoginFormData}
        ).then(function successCallback(response) {
            if (response.data.Code === 200) {
                window.location = 'index.html';
            } else {
                $("#LoginMsg").fadeIn();
                $("#LoginMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Invalid Username or Password.</div>");
                $("#LoginMsg").fadeOut(4000);
            }
        });
    };
    $scope.LoginFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.LoginForm.$valid) {
            $scope.UsernameRequired = false;
            $scope.PasswordRequired = false;
            return true;
        } else {
            if ($scope.LoginForm.Username.$invalid) {
                $scope.UsernameRequired = true;
            }
            if ($scope.LoginForm.Password.$invalid) {
                $scope.PasswordRequired = true;
            }
            return false;
        }
    };
    $scope.CheckLogin = function () { // 

        $http({
            method: 'get',
            url: 'api/admin/CheckLogin.php'
        }).then(function successCallback(response) {
            if (response.data.Code === 200) {
                window.location = 'index.html';
            }
        });
    };
});
