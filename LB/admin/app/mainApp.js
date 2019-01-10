/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module("app", []);
app.controller("MainController", function ($scope, $http, $rootScope) {
    
    $scope.init = function () { // Load data on page for first time
        $scope.CheckLogin();
    };
    $scope.CheckLogin = function () { // 

        $http({
            method: 'get',
            url: 'api/admin/CheckLogin.php'
        }).then(function successCallback(response) {
            if (response.data.Code === 401) {
                window.location = 'login.html';
            }
        });
    };
    $scope.logout = function () { // 
        $http({
            method: 'get',
            url: 'api/admin/Logout.php'
        }).then(function successCallback(response) {
            if (response.data.Code === 401) {
                window.location = 'login.html';
            }
        });
    };
});


