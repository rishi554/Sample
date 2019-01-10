/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module("app", []);
app.controller("ProductController", function ($scope, $http, $rootScope) {
    
    $scope.init = function () { // Load data on page for first time
        $scope.GetTeams();
        $scope.GetBrands();
        $scope.GetGroups();
        $scope.GetSubgroups();
        $scope.GetDepartments();
        $scope.GetCompanies();
        $scope.GetTaxes();
        $scope.GetUnits();
        $scope.GetItemTypes();
        $scope.Getmatrixs();
        $scope.GetLists();
    };
    $scope.CheckLogin = function () { 
        $http({
            method: 'get',
            url: 'api/admin/CheckLogin.php'
        }).then(function successCallback(response) {
            if (response.data.Code === 401) {
                window.location = 'login.html';
            }
        });
    };
    $scope.CheckLogin();
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
    $rootScope.$on("ReloadPCompanies", function(){
        $scope.GetCompanies();
    });
    $rootScope.$on("ReloadBrands", function(){
        $scope.GetBrands();
    });
    $rootScope.$on("ReloadDepartments", function(){
        $scope.GetDepartments();
    });
    $rootScope.$on("ReloadGroups", function(){
        $scope.GetGroups();
    });
    $rootScope.$on("ReloadSubgroups", function(){
        $scope.GetSubgroups();
    });
    $rootScope.$on("ReloadTaxes", function(){
        $scope.GetTaxes();
    });
    $rootScope.$on("ReloadUnits", function(){
        $scope.GetUnits();
    });
    $rootScope.$on("ReloadLists", function(){
        $scope.GetLists();
    });
    $rootScope.$on("ReloadMatrixs", function(){
        $scope.Getmatrixs();
    });
    
    $scope.GetTeams = function(){
        $http({
            method: 'get',
            url: 'api/master/others/Teams/GetTeams.php'
        }).then(function successCallback(response) {
            return $scope.Teams = response.data;
        });
    };
    $scope.GetBrands = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getBrands.php'
        }).then(function successCallback(response) {
            return $scope.Brands = response.data;
        });
    };
    $scope.GetGroups = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getGroups.php'
        }).then(function successCallback(response) {
            return $scope.groups = response.data;
        });
    };
    $scope.GetSubgroups = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getSubgroups.php'
        }).then(function successCallback(response) {
            return $scope.subgroups = response.data;
        });
    };
    $scope.GetDepartments = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getDepartments.php'
        }).then(function successCallback(response) {
            return $scope.Departments = response.data;
        });
    };
    $scope.GetCompanies = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getCompanies.php'
        }).then(function successCallback(response) {
            return $scope.Companies = response.data;
        });
    };
    $scope.GetTaxes = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getTaxes.php'
        }).then(function successCallback(response) {
            return $scope.Taxes = response.data;
        });
    };
    $scope.GetUnits = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getUnits.php'
        }).then(function successCallback(response) {
            return $scope.Units = response.data;
        });
    };
    $scope.GetItemTypes = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getItemTypes.php'
        }).then(function successCallback(response) {
            return $scope.ItemTypes = response.data;
        });
    };
    $scope.Getmatrixs = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getMatrixs.php'
        }).then(function successCallback(response) {
            return $scope.Matrixs = response.data;
        });
    };
    $scope.GetLists = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getLists.php'
        }).then(function successCallback(response) {
            return $scope.Lists = response.data;
        });
    };
    $scope.CheckLogin = function(){
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getLists.php'
        }).then(function successCallback(response) {
            return $scope.Lists = response.data;
        });
    };
    $scope.ProductFormData = {};
    $scope.ProductSave = function(){
        var formData = new FormData();
        
        // Form data
        for (var key in $scope.ProductFormData) {
            formData.append(key, $scope.ProductFormData[key]);
        }
        //Picture 1
        var file1 = $("#ProductImage1")[0].files[0];
        formData.append("ProductImage1", file1);
        
        //Picture 2
        var file2 = $("#ProductImage2")[0].files[0];
        formData.append("ProductImage2", file2);
        
        $http.post(
                "api/master/others/ProductManagement/addProduct.php",
                formData,
                {   
                    transformRequest: angular.identity,
                    headers:{
                        'Content-Type': undefined 
                    }
                }
        ).then(function successCallback(response) {
            // Store response data
            
            if(parseInt(response.data)){
                $("#ProductMsg").fadeIn();
                $("#ProductMsg").html("<div class='alert alert-success'><strong>Done !</strong> Entry saved successfully.</div>");
                $("#ProductMsg").fadeOut(4000);
                $("#ProductForm").trigger("reset");
            }else{
                $("#ProductMsg").fadeIn();
                $("#ProductMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Product entry.</div>");
                $("#ProductMsg").fadeOut(4000);
                
            }
            $(window).scrollTop("#ProductMsg");
        });
    };
    $scope.ProductFormReset = function(){
        $("#ProductForm").trigger("reset");
    };
});
app.controller("PrincipleCompanyController", function ($scope, $http, $rootScope) {
    $scope.CompanyFormData = {};
    $scope.PrincipleCompanySave = function () {
        $http.post(
                "api/master/others/ProductManagement/addCompany.php",
                {'CompanyFormData':$scope.CompanyFormData}
        ).then(function successCallback(response) {
            // Store response data
            
            if(parseInt(response.data)){
                $scope.$emit("ReloadPCompanies");
                $scope.CompanyName = null;
                $('#PrincipleCompanyModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#PrincipleCompanyMsg").fadeIn();
                $("#PrincipleCompanyMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Company entry.</div>");
                $("#PrincipleCompanyMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.PrincipleCompanyFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.PrincipleCompanyForm.$valid){
          $scope.CompanyNameRequired = false;
          return true;
        }else{
          if($scope.PrincipleCompanyForm.CompanyName.$invalid){
            $scope.CompanyNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("BrandController", function ($scope, $http, $rootScope) {
    $scope.BrandFormData = {};
    $scope.BrandSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addBrand.php",
                {'BrandFormData':$scope.BrandFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadBrands");
                $scope.BrandName = null;
                $scope.AreaAlloted = null;
                $('#BrandModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#BrandMsg").fadeIn();
                $("#BrandMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Brand entry.</div>");
                $("#BrandMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.BrandFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.BrandForm.$valid){
          $scope.BrandNameRequired = false;
          $scope.AreaAllotedRequired = false;
          return true;
        }else{
          if($scope.BrandForm.BrandName.$invalid){
            $scope.BrandNameRequired = true; 
          }
          if($scope.BrandForm.AreaAlloted.$invalid){
            $scope.AreaAllotedRequired = true; 
          }
          return false;
        }
    };
});
app.controller("DepartmentController", function ($scope, $http, $rootScope) {
    $scope.DepartmentFormData = {};
    $scope.DepartmentSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addDepartment.php",
                {'DepartmentFormData':$scope.DepartmentFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadDepartments");
                $scope.DepartmentName = null;
                $scope.AreaAlloted = null;
                $('#DepartmentModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#DepartmentMsg").fadeIn();
                $("#DepartmentMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Department entry.</div>");
                $("#DepartmentMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.DepartmentFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.DepartmentForm.$valid){
          $scope.DepartmentNameRequired = false;
          $scope.AreaAllotedRequired = false;
          return true;
        }else{
          if($scope.DepartmentForm.DepartmentName.$invalid){
            $scope.DepartmentNameRequired = true; 
          }
          if($scope.DepartmentForm.AreaAlloted.$invalid){
            $scope.AreaAllotedRequired = true; 
          }
          return false;
        }
    };
});
app.controller("GroupController", function ($scope, $http, $rootScope) {
    $scope.GroupFormData = {};
    $scope.GroupSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addGroup.php",
                {'GroupFormData':$scope.GroupFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadGroups");
                $scope.GroupName = null;
                $('#ProductGroupModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#GroupMsg").fadeIn();
                $("#GroupMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Group entry.</div>");
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
app.controller("SubgroupController", function ($scope, $http, $rootScope) {
    $scope.SubgroupFormData = {};
    $scope.SubgroupSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addSubgroups.php",
                {'SubgroupFormData':$scope.SubgroupFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadSubgroups");
                $scope.SubgroupName = null;
                $('#ProductsubgroupModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#SubgroupMsg").fadeIn();
                $("#SubgroupMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Subgroup entry.</div>");
                $("#SubgroupMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.SubgroupFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.SubgroupForm.$valid){
          $scope.SubgroupNameRequired = false;
          return true;
        }else{
          if($scope.SubgroupForm.SubgroupName.$invalid){
            $scope.SubgroupNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("ProductTaxController", function ($scope, $http, $rootScope) {
    $scope.TaxFormData = {};
    $scope.ProductTaxSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addTax.php",
                {'TaxFormData':$scope.TaxFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadTaxes");
                $('#ProductTaxForm').trigger('reset');
                $('#ProductTaxModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#ProductTaxMsg").fadeIn();
                $("#ProductTaxMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Tax entry.</div>");
                $("#ProductTaxMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.ProductTaxFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.ProductTaxForm.$valid){
          $scope.TaxNameRequired = false;
          $scope.TaxValueRequired = false;
          return true;
        }else{
          if($scope.ProductTaxForm.TaxName.$invalid){
            $scope.TaxNameRequired = true; 
          }
          if($scope.ProductTaxForm.TaxValue.$invalid){
            $scope.TaxValueRequired = true;
          }
          return false;
        }
    };
});
app.controller("UnitController", function ($scope, $http, $rootScope) {
    $scope.UnitFormData = {};
    $scope.UnitSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addUnit.php",
                {'UnitFormData':$scope.UnitFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadUnits");
                $scope.UnitName = null;
                $scope.FormalName = null;
                $scope.DigitAfterDecimal = null;
                $('#UnitModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#UnitMsg").fadeIn();
                $("#UnitMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Unit entry.</div>");
                $("#UnitMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.UnitFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.UnitForm.$valid){
          $scope.UnitNameRequired = false;
          $scope.FormalNameRequired = false;
          $scope.TaxValueRequired = false;
          return true;
        }else{
          if($scope.UnitForm.UnitName.$invalid){
            $scope.UnitNameRequired = true; 
          }
          if($scope.UnitForm.FormalName.$invalid){
            $scope.FormalNameRequired = true;
          }
          if($scope.UnitForm.DigitAfterDecimal.$invalid){
            $scope.TaxValueRequired = true;
          }
          return false;
        }
    };
});
app.controller("MatrixController", function ($scope, $http, $rootScope) {
    $scope.MatrixFormData = {};
    $scope.MatrixSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addMatrix.php",
                {'MatrixFormData':$scope.MatrixFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadMatrixs");
                $('#MatrixForm').trigger("reset");
                $('#MatrixModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#MatrixMsg").fadeIn();
                $("#MatrixMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Matrix entry.</div>");
                $("#MatrixMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.MatrixFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.MatrixForm.$valid){
          $scope.MatrixNameRequired = false;
          $scope.List1NameRequired = false;
          $scope.List2NameRequired = false;
          $scope.List3NameRequired = false;
          return true;
        }else{
          if($scope.MatrixForm.MatrixName.$invalid){
            $scope.MatrixNameRequired = true; 
          }
          if($scope.MatrixForm.List1Name.$invalid){
            $scope.List1NameRequired = true; 
          }
          if($scope.MatrixForm.List2Name.$invalid){
            $scope.List2NameRequired = true; 
          }
          if($scope.MatrixForm.List3Name.$invalid){
            $scope.List3NameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("MatrixListController", function ($scope, $http, $rootScope) {
    $scope.MatrixListFormData = {};
    $scope.MatrixListSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addMatrixList.php",
                {'MatrixListFormData':$scope.MatrixListFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadMatrixLists");
                $('#MatrixListForm').trigger("reset");
                $('#MatrixListModal').modal('toggle'); 
            }else{
                $("#MatrixListMsg").fadeIn();
                $("#MatrixListMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Matrix List entry.</div>");
                $("#MatrixListMsg").fadeOut(4000);
            }
        });
    };
    $scope.MatrixListFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.MatrixListForm.$valid){
          $scope.MatrixListNameRequired = false;
          return true;
        }else{
          if($scope.MatrixListForm.MatrixListName.$invalid){
            $scope.MatrixListNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("ListController", function ($scope, $http, $rootScope) {
    $scope.ListFormData = {};
    $scope.ListSave = function () {
        $http.post(
                "api/master/others/ProductManagement/addList.php",
                {'ListFormData':$scope.ListFormData}
        ).then(function successCallback(response) {
            // Store response data
            if(parseInt(response.data)){
                $scope.$emit("ReloadLists");
                $('#ListForm').trigger("reset");
                $('#ListModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            }else{
                $("#ListMsg").fadeIn();
                $("#ListMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved List entry.</div>");
                $("#ListMsg").fadeOut(4000);
                
            }
        });
    };
    $scope.ListFormValidate = function ($event) {
        $event.preventDefault();
        if($scope.ListForm.$valid){
          $scope.ListNameRequired = false;
          return true;
        }else{
          if($scope.ListForm.ListName.$invalid){
            $scope.ListNameRequired = true; 
          }
          return false;
        }
    };
});
app.controller("ProductListController", function ($scope, $http, $rootScope) {
    
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

