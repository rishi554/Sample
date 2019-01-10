/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module("app", []);
app.directive("fileInput", function ($parse) {
    return {
        link: function ($scope, element, attrs) {
            element.on("change", function (event) {
                var files = event.target.files;
                $parse(attrs.fileInput).assign($scope, element[0].files);
                $scope.$apply();
            });
        }
    };
});

app.controller("CustomerController", function ($scope, $http, $rootScope) { 
    
    $scope.init = function () { // Load data on page for first time
        $scope.GetCustTypes();
        $scope.GetCardTypes();
        $scope.GetWeekDays();
        $scope.GetInterestRateCharge();
        $scope.GetTeams();
        $scope.Account();
        $scope.getGroups();
        $scope.getGroupTypes();
        $scope.GetLocations();
        $scope.GetCustomers();
        $scope.CustCityDropdown = true;
        $scope.AccCityDropdown = true;
        $scope.CustMainCityDropdown = true;
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
    $rootScope.$on("ReloadLocation", function(){
        $scope.GetLocations();
    });
    $rootScope.$on("ReloadGroupType", function(){
        $scope.getGroupTypes();
    });
    $rootScope.$on("ReloadCustomerType", function(){
        $scope.GetCustTypes();
    });
    $rootScope.$on("ReloadAccounts", function(){
        $scope.Account();
    });
    $rootScope.$on("ReloadCardType", function(){
        $scope.GetCardTypes();
    });
    $rootScope.$on("ReloadGroups", function(){
        $scope.getGroups();
    });
    $rootScope.$on("ReloadTeams", function(){
        return $scope.GetTeams();
    });
    $rootScope.$on("ReloadCustomers", function(){
           $scope.GetCustomers();
    });
    $rootScope.$on("LocationSearch", function(event,string,result){
        var SearchFlag = $scope.LocationSearch(string,result);
        $scope.$broadcast("SearchFlag",SearchFlag);
    });
    $scope.GetCustTypes = function () {
        $http({
            method: 'get',
            url: 'api/master/others/CustomerType/GetCustomerType.php'
        }).then(function successCallback(response) {
            $scope.CustTypeNames = response.data;
        });
    };
    $scope.GetCardTypes = function () {
        $http({
            method: 'get',
            url: 'api/master/others/CardType/GetCardType.php'
        }).then(function successCallback(response) {
            
            $scope.CardTypeNames = response.data;
        });
    };
    $scope.GetWeekDays = function(){
        $http({
            method: 'get',
            url: 'api/master/others/WeekDays/GetWeekDays.php'
        }).then(function successCallback(response) {
            $scope.Days = response.data;
        });
    };
    $scope.GetInterestRateCharge = function(){
        $http({
            method: 'get',
            url: 'api/master/others/InterestCharge/GetInterestRate.php'
        }).then(function successCallback(response) {
            $scope.InterestRate = response.data;
        });
    };
    $scope.GetTeams = function(){
        $http({
            method: 'get',
            url: 'api/master/others/Teams/GetTeams.php'
        }).then(function successCallback(response) {
            return $scope.Teams = response.data;
        });
    };
    $scope.Account = function(){
        $http({
            method: 'get',
            url: 'api/master/accounts/GetAccounts.php'
        }).then(function successCallback(response) {
            $scope.Accounts = response.data;
        });
    };
    $scope.getGroups = function(){
        $http({
            method: 'get',
            url: 'api/master/Groups/getGroups.php'
        }).then(function successCallback(response) {
            $scope.PGroups = response.data;
        });
    };
    $scope.getGroupTypes = function(){
        $http({
            method: 'get',
            url: 'api/master/Groups/getGroupTypes.php'
        }).then(function successCallback(response) {
            $scope.GroupTypes = response.data;
        });
    };
    $scope.GetLocations = function () {
        $http({
            method: 'get',
            url: 'api/master/LocationMaster/getLocations.php'
        }).then(function successCallback(response) {
            $scope.Locations = response.data;
        });
    };
    $scope.GetCustomers = function () {
        $http({
            method: 'get',
            url: 'api/master/others/CustomerManagement/getCustomers.php'
        }).then(function successCallback(response) {
            $scope.Customers = response.data;
        });
    };
    $scope.LocationSearch = function (string,result) {
        var SearchFlag = false;
        if (string !== null && result.length === 0) {
            SearchFlag = false;
        } else {
            SearchFlag = true;
        }
        return SearchFlag;
    };
    
    $scope.CustFormData = {};
    $scope.CustomerSave = function () {
        var formData = new FormData();
        for (var key in $scope.CustFormData) {
            formData.append(key, $scope.CustFormData[key]);
        }
        var file = $("#ProfileImage")[0].files[0];
        formData.append("ProfileImage", file);
        
        $http.post(
                "api/master/others/CustomerManagement/AddCustomer.php",
                formData,
                {   
                    transformRequest: angular.identity,
                    headers:{
                        'Content-Type': undefined 
                    }
                }
        ).then(function successCallback(response) {
            if (parseInt(response.data)) {
                $scope.$emit("ReloadCustomers");
                $("#CustomerMsg").fadeIn();
                $("#CustomerForm").trigger("reset");
                $("#CustomerMsg").html("<div class='alert alert-success'><strong>Done !</strong> Customer registered successfully.</div>");
                $("#CustomerMsg").fadeOut(4000);
            } else {
                $("#CustomerMsg").fadeIn();
                $("#CustomerMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Customer entry.</div>");
                $("#CustomerMsg").fadeOut(4000);
            }
            $(window).scrollTop("#CustomerMsg");
        });
    };
    $scope.CustomerFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.CustomerForm.$valid){
          $scope.firstnameRequired = false;
          return true;
        }else{
          if($scope.CustomerForm.firstname.$invalid){
            $scope.firstnameRequired = true; 
          }
          return false;
        }
    };
    $scope.CustomerSearchCity = function(string){
        if(string){
            if($scope.LocationSearch(string, $scope.CustomerSearchResult)){
                $scope.CustCityDropdown = false; // Location found in existing list
                $("#LocMsgCust").html("");
            } else {
                $scope.CustCityDropdown = true;  // Location is not found in existing list
                $("#LocMsgCust").html("<div style='color:red'><strong>Sorry !</strong> City not found. <a href='#LocationModal' role='button' data-toggle='modal'>Add City</a></div>");
            }
        }else{
            $scope.CustCityDropdown = true;  // blank textbox
            $("#LocMsgCust").html("");
        }
    };
    $scope.FillTextboxCustomer = function(string){
        $scope.altCity = string.CityName;
        $scope.CustFormData.altState = string.StateName;
        $scope.CustFormData.altCountry = string.CountryName;
        
        $scope.CustFormData.altCountryId = string.CountryId;
        $scope.CustFormData.altCityId = string.CityId;
        $scope.CustFormData.altStateId = string.StateId;
        $scope.CustCityDropdown = true;
    };
    $scope.CustomerSearchMainCity = function(string){
        if(string){
            if($scope.LocationSearch(string, $scope.CustomerSearchMainResult)){
                $scope.CustMainCityDropdown = false; // Location found in existing list
                $("#LocMsgMain").html("");
            } else {
                $scope.CustMainCityDropdown = true;  // Location is not found in existing list
                $("#LocMsgMain").html("<div style='color:red'><strong>Sorry !</strong> City not found. <a href='#LocationModal' role='button' data-toggle='modal'>Add City</a></div>");
            }
        }else{
            $scope.CustMainCityDropdown = true;  // blank textbox
            $("#LocMsgMain").html("");
        }
    };
    $scope.FillTextboxCustomerMain = function(string){
        $scope.MainCity = string.CityName;
        $scope.CustFormData.MainState = string.StateName;
        $scope.CustFormData.MainCountry = string.CountryName;
        
        $scope.CustFormData.MainCountryId = string.CountryId;
        $scope.CustFormData.MainCityId = string.CityId;
        $scope.CustFormData.MainStateId = string.StateId;
        $scope.CustMainCityDropdown = true;
    };
    $scope.reset = function(){
        $("#CustomerForm").trigger("reset");
    };
    
});

app.controller("CustomerTypeController", function ($scope, $http, $rootScope) { 
    
    $scope.CustomerTypeSave = function () {  
        $http.post(
                "api/master/others/CustomerType/AddCustomerType.php",
                {'Name':$scope.CustTypeName}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $rootScope.$emit("ReloadCustomerType");
                $scope.CustTypeName = null;
                $('#myModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#CustTypeNameMsg").fadeIn();
                $("#CustTypeNameMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Customer type entry.</div>");
                $("#CustTypeNameMsg").fadeOut(4000);
            }
            
        });
    };
    $scope.CustTypeFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.CustTypeForm.$valid){
          $scope.CustTypeNameRequired = false;
          return true;
        }else{
          if($scope.CustTypeForm.CustTypeName.$invalid){
            $scope.CustTypeNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("CardTypeController", function ($scope, $http, $rootScope) { 
    $scope.FormData = {};
    $scope.CardTypeSave = function () {
        $http.post(
                "api/master/others/CardType/AddCardType.php",
                {'FormData':$scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $rootScope.$emit("ReloadCardType");
                $scope.CardTypeForm.$setUntouched();
                $scope.FormData = null;
                $('#CardTypeModal').modal('toggle');
            }else{
                $("#CardTypeNameMsg").fadeIn();
                $("#CardTypeNameMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Card type entry.</div>");
                $("#CardTypeNameMsg").fadeOut(4000);
            }
        });
    };
    $scope.CardTypeFormValidate = function ($event) {
        $event.preventDefault();
//        if($scope.CustTypeForm.$valid){
//          $scope.CustTypeNameRequired = false;
//          return true;
//        }else{
//          if($scope.CustTypeForm.CustTypeName.$invalid){
//            $scope.CustTypeNameRequired = true; 
//          }
//          return false;
//        }
    };
});
app.controller("AccountController", function ($scope, $http, $rootScope) {
    $scope.FormData = {};
    $scope.AccountSave = function () {
        $http.post(
                "api/master/accounts/AddAccount.php",
                {'FormData':$scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $rootScope.$emit("ReloadAccounts");
                $scope.FormData = null;
                $('#AccountModal').modal('toggle'); 
            }else{
                $("#AccountMsg").fadeIn();
                $("#AccountMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved account entry.</div>");
                $("#AccountMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.AccountSearchCity = function(string){
        if(string){
            $scope.$emit("LocationSearch", string, $scope.AccountSearchResult);
            $scope.$on("SearchFlag",function(event,data){
                if (data) {
                    $scope.AccCityDropdown = false; // Location found in existing list
                    $("#LocMsgAcc").html("");
                } else {
                    $scope.AccCityDropdown = true;  // Location is not found in existing list
                    $("#LocMsgAcc").html("<div style='color:red'><strong>Sorry !</strong> City not found. <a href='#LocationModal' role='button' data-toggle='modal'>Add City</a></div>");
                }
            });
        }else{
            $scope.AccCityDropdown = true;  // blank textbox
            $("#LocMsgAcc").html("");
        }
    };
    
    $scope.FillTextboxAccount = function(string){
        $scope.CityName = string.CityName;
        $scope.FormData.StateName = string.StateName;
        $scope.FormData.CountryName = string.CountryName;
        
        $scope.FormData.CountryId = string.CountryId;
        $scope.FormData.CityId = string.CityId;
        $scope.FormData.StateId = string.StateId;
        $scope.AccCityDropdown = true;
    };
    $scope.AccountFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.AccountForm.$valid){
          $scope.CityIdRequired = false;
          return true;
        }else{
          if($scope.AccountForm.CityId.$invalid){
            $scope.CityIdRequired = true; 
          }
          return false;
        }
    };
});
app.controller("GroupController", function ($scope, $http, $rootScope) { 
    
    $scope.FormData = {};
    $scope.GroupSave = function () {
        $http.post(
                "api/master/Groups/AddGroup.php",
                {'FormData':$scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $rootScope.$emit("ReloadGroups");
                $scope.FormData = null;
                $('#GroupModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#GroupMsg").fadeIn();
                $("#GroupMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved group entry.</div>");
                $("#GroupMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.GroupFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.GroupForm.$valid){
          $scope.GroupNameRequired = false;
          return true;
        }else{
          if($scope.GroupForm.GroupName.$invalid){
            $scope.GroupNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("GroupTypeController", function ($scope, $http, $rootScope) { 
    
    $scope.FormData = {};
    $scope.GroupTypeSave = function () {
        $http.post(
                "api/master/Groups/AddGroupType.php",
                {'FormData':$scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $rootScope.$emit("ReloadGroupType");
                $scope.FormData = null;
                $('#GroupTypeModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#GroupTypeMsg").fadeIn();
                $("#GroupTypeMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Group Type entry.</div>");
                $("#GroupTypeMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.GroupTypeFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.GroupTypeForm.$valid){
          $scope.GroupTypeNameRequired = false;
          return true;
        }else{
          if($scope.GroupTypeForm.CustTypeName.$invalid){
            $scope.GroupTypeNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("LocationController", function ($scope, $http, $rootScope) { 
    
    $scope.FormData = {};
    $scope.LocationSave = function () {
        $http.post(
                "api/master/LocationMaster/AddLocation.php",
                {'FormData':$scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $rootScope.$emit("ReloadLocation");
                $scope.FormData = null;
                $('#LocationModal').modal('toggle');
            }else{
                $("#LocationMsg1").fadeIn();
                $("#LocationMsg1").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Location entry.</div>");
                $("#LocationMsg1").fadeOut(4000);
                return false;
            }
        });
    };
    $scope.LocationFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.LocationForm.$valid){
          $scope.CityNameRequired = false;
          $scope.StateNameRequired = false;
          $scope.CountryNameRequired = false;
          return true;
        }else{
          if($scope.LocationForm.CityName.$invalid){
            $scope.CityNameRequired = true;
          }
          if($scope.LocationForm.StateName.$invalid){
            $scope.StateNameRequired = true;
          }
          if($scope.LocationForm.CountryName.$invalid){
            $scope.CountryNameRequired = true;
          }
          return false;
        }
    };
    $scope.reset = function(){
        $scope.LocationForm.$setUntouched();
        $scope.FormData = null;
    };
});
app.controller("TeamController", function ($scope, $http, $rootScope) { 
    
    $scope.FormData = {};
    $scope.TeamSave = function () {
        $http.post(
                "api/master/others/Teams/AddTeam.php",
                {'FormData':$scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if(response.data){
                $scope.$emit("ReloadTeams");
                $scope.FormData = null;
                $('#TeamModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#TeamMsg1").fadeIn();
                $("#TeamMsg1").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Team entry.</div>");
                $("#TeamMsg1").fadeOut(4000);
                
            }
        });
    };
    $scope.TeamFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.TeamForm.$valid){
          $scope.TeamNameRequired = false;
          return true;
        }else{
          if($scope.TeamForm.TeamName.$invalid){
            $scope.TeamNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("CustListController", function ($scope, $http) { 
    
    $scope.Delete = function(id){
        var x = confirm("Are you sure ! Do you want to delete");
        if(x){
            $http.post(
                    "api/master/others/CustomerManagement/deleteCustomer.php",
                    {'id': id}
            ).then(function successCallback(response) {
                // Store response data
                alert(response.data);
                if(response.data){
                    $scope.$emit("ReloadCustomers");
                    $("#CustDeleteMsg").fadeIn();
                    $("#CustDeleteMsg").html("<div class='alert alert-success'><strong>Done !</strong> Customer removed successfully.</div>");
                    $("#CustDeleteMsg").fadeOut(4000);
                }else{
                    $("#CustDeleteMsg").fadeIn();
                    $("#CustDeleteMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Something went wrong.</div>");
                    $("#CustDeleteMsg").fadeOut(4000);
                }
            });
        }else{
            return false;
        } 
    };
    $scope.Update = function(data){
        alert(JSON.stringify(data));
    };
    
});





