/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module("app", []);
app.controller("MenuController", function ($scope, $http, $rootScope) {

    $scope.ProductData = [];
    $scope.SubMenuId = [];
    $scope.QuestionId = [];
    $scope.ModifierId = [];
    $scope.FlavorId = [];
    $scope.ProductChildList = [];
    $scope.Rate = [];
    $scope.TaxAmount = [];
    $scope.IsMultilayered = [];
    $scope.LayerCount = [];

    $scope.SubMenuIdSelected = 0;
    $scope.ForcedQuestionIdSelected = 0;
    $scope.ModifierIdSelected = "None";
    $scope.FlavorsIdSelected = "None";
    $scope.MainLocationDropdown = true;

    $scope.init = function () { // Load data on page for first time

        $scope.GetTeams();
        $scope.GetGrouping();
        $scope.GetProducts();
        $scope.GetSubMenus();
        $scope.GetForcedQuestions();
        $scope.GetMasterModifiers();
        $scope.GetMasterModifiersType();
        $scope.GetFlavors();
        $scope.ProductDropdown = true;
        $scope.CheckLogin();
        $scope.GetMainLocations();
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
    $rootScope.$on("ReloadPCompanies", function () {
        $scope.GetCompanies();
    });
    $rootScope.$on("ReloadSubMenus", function () {
        $scope.GetSubMenus();
    });
    $rootScope.$on("ReloadTeams", function () {
        $scope.GetTeams();
    });
    $rootScope.$on("ReloadForcedQuestion", function () {
        $scope.GetForcedQuestions();
    });
    $rootScope.$on("ReloadMasterModifiers", function () {
        $scope.GetMasterModifiers();
    });
    $rootScope.$on("ReloadFlavors", function () {
        $scope.GetFlavors();
    });
    $rootScope.$on("MenuSearch", function (event, string, result) {
        var SearchFlag = $scope.MenuSearch(string, result);
        $scope.$broadcast("SearchFlag", SearchFlag);
    });
    $scope.MenuSearch = function (string, result) {
        var SearchFlag = false;
        if (string !== null && result.length === 0) {
            SearchFlag = false;
        } else {
            SearchFlag = true;
        }
        return SearchFlag;
    };
    $scope.GetTeams = function () {
        $http({
            method: 'get',
            url: 'api/master/others/Teams/GetTeams.php'
        }).then(function successCallback(response) {
            return $scope.Teams = response.data;
        });
    };
    $scope.GetMainLocations = function () {
        $http({
            method: 'get',
            url: 'api/master/LocationMaster/getMainLocations.php'
        }).then(function successCallback(response) {
            $scope.MainLocations = response.data;
        });
    };
    $scope.GetGrouping = function () {
        $http({
            method: 'get',
            url: 'api/master/MenuManagement/getGroupings.php'
        }).then(function successCallback(response) {
            return $scope.Groups = response.data;
        });
    };
    $scope.GetProducts = function () {
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getProducts.php'
        }).then(function successCallback(response) {
            $scope.Products = response.data;
        });
    };
    $scope.GetSubMenus = function () {
        $http({
            method: 'get',
            url: 'api/master/MenuManagement/getSubmenus.php'
        }).then(function successCallback(response) {
            $scope.SubMenus = response.data;
        });
    };
    $scope.GetForcedQuestions = function () {
        $http({
            method: 'get',
            url: 'api/master/MenuManagement/getQuestions.php'
        }).then(function successCallback(response) {
            $scope.Questions = response.data;
        });
    };
    $scope.GetMasterModifiers = function () {
        $http({
            method: 'get',
            url: 'api/master/MenuManagement/getMasterModifiers.php'
        }).then(function successCallback(response) {
            $scope.Modifiers = response.data;
        });
    };
    $scope.GetMasterModifiersType = function () {
        $http({
            method: 'get',
            url: 'api/master/MenuManagement/getMasterModifiersType.php'
        }).then(function successCallback(response) {
            $scope.ModifierTypes = response.data;
        });
    };
    $scope.GetFlavors = function () {
        $http({
            method: 'get',
            url: 'api/master/MenuManagement/getFlavors.php'
        }).then(function successCallback(response) {
            $scope.Flavors = response.data;
        });
    };
    $scope.RateSelectorSave = function (id) {
        var Rate = $("#RateId" + id).val();
        var Data = $("#RateData" + id).val();
        var RateData = JSON.parse(Data);
        var result = Object.keys($scope.ProductChildList).map(e => $scope.ProductChildList[e]);
        if (RateData) {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $http.post(
                            "api/master/others/ProductManagement/getTaxAmount.php",
                            {'TaxId': RateData.TaxIdSale, 'discount': RateData.ProductDIscount, 'rate': Rate}
                    ).then(function successCallback(response) {
                        // Store response data
                        $scope.Rate[i] = Rate;
                        $("#RateSelected" + id).html(Rate);
                        $scope.TaxAmount[i] = parseFloat(response.data).toFixed(2);
                    });
                    break;
                }
            }
        } else {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.Rate[i] = 0;
                    $("#RateSelected" + id).html(0);
                    $scope.TaxAmount[i] = 0;
                    break;
                }
            }
        }
        $('#RateSelectorModal' + id).modal('toggle');
    };
    $scope.SubmenuSelectorSave = function (id) {
        var SubmenuIds = $("#SubMenuId" + id).val();
        var result = Object.keys($scope.ProductChildList).map(e => $scope.ProductChildList[e]);
        if (SubmenuIds !== null) {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.SubMenuId[i] = SubmenuIds;
                    $("#SubMenuIdSelected" + id).html(SubmenuIds.length);
                }
            }
        } else {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.SubMenuId[i] = 0;
                    $("#SubMenuIdSelected" + id).html(0);
                }
            }
        }
        $('#SubmenuSelectorModal' + id).modal('toggle');
    };
    $scope.QuestionSelectorSave = function (id) {

        var QuestionsIds = $("#QuestionsId" + id).val();
        var result = Object.keys($scope.ProductChildList).map(e => $scope.ProductChildList[e]);
        if (QuestionsIds !== null) {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.QuestionId[i] = QuestionsIds;
                    $("#ForcedQuestionIdSelected" + id).html(QuestionsIds.length);
                }
            }
        } else {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.QuestionId[i] = 0;
                    $("#ForcedQuestionIdSelected" + id).html(0);
                }
            }
        }
        $('#QuestionsSelectorModal' + id).modal('toggle');
    };
    $scope.ModifierSelectorSave = function (id) {
        var ModifiersIds = $("#ModifiersId" + id).val();
        var ModifierData = JSON.parse(ModifiersIds);
        var result = Object.keys($scope.ProductChildList).map(e => $scope.ProductChildList[e]);
        if (ModifierData) {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.ModifierId[i] = ModifierData.ModifierId;
                    $("#ModifierIdSelected" + id).html(ModifierData.ModifierName);
                }
            }
        } else {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.ModifierId[i] = "None";
                    $("#ModifierIdSelected" + id).html("None");
                }
            }
        }
        $('#ModifierSelectorModal' + id).modal('toggle');
    };
    $scope.FlavorSelectorSave = function (id) {
        var FlavorIds = $("#FlavorId" + id).val();
        var FlavorData = JSON.parse(FlavorIds);
        var result = Object.keys($scope.ProductChildList).map(e => $scope.ProductChildList[e]);
        if (FlavorData) {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.FlavorId[i] = FlavorData.FlavorMasterId;
                    $("#FlavorsIdSelected" + id).html(FlavorData.FlavorMasterName);
                }
            }
        } else {
            for (var i = 0; i < result.length; i++) {
                if (i === id) {
                    $scope.FlavorId[i] = "None";
                    $("#FlavorsIdSelected" + id).html("None");
                }
            }
        }
        $('#FlavorSelectorModal' + id).modal('toggle');
    };
    $scope.MenuProductSearch = function (string) {
        if (string) {
            if ($scope.MenuSearch(string, $scope.ProductSearchResult)) {
                $scope.ProductDropdown = false; // Location found in existing list
                $("#ProductMenuMsg").html("");
            } else {
                $scope.ProductDropdown = true;  // Location is not found in existing list
                $("#ProductMenuMsg").html("<div style='color:red'><strong>Sorry !</strong> Product not found. Please add product first.</div>");
            }
        } else {
            $scope.ProductDropdown = true;  // hide search result
            $("#ProductMenuMsg").html("");// hide error message
        }
    };
    $scope.MainLocationSearch = function (string) {
        if (string) {
            if ($scope.MenuSearch(string, $scope.MainLocationSearchResult)) {
                $scope.MainLocationDropdown = false; // Location found in existing list
                $("#MainLocationMsg").html("");
            } else {
                $scope.MainLocationDropdown = true;  // Location is not found in existing list
                $("#MainLocationMsg").html("<div style='color:red'><strong>Sorry !</strong> Location not found. <a href='#MainLocationModal' role='button' data-toggle='modal'>Add Location</a>.</div>");
            }
        } else {
            $scope.MainLocationDropdown = true;  // hide search result
            $("#MainLocationMsg").html("");// hide error message
        }
    };
    $scope.MenuFormData = {};
    $scope.MenuSave = function () {
        $http.post(
                "api/master/MenuManagement/addMenuMaster.php",
                {'MenuFormData': $scope.MenuFormData, 'SubMenuId': $scope.SubMenuId, 'ProductData': $scope.ProductData, 'QuestionId': $scope.QuestionId, 'ModifierId': $scope.ModifierId, 'FlavorId': $scope.FlavorId,'Rate':$scope.Rate,'TaxAmount':$scope.TaxAmount,'IsMultiLayered': $scope.IsMultilayered,'LayerCount':$scope.LayerCount}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $("#MenuMsg").fadeIn();
                $("#MenuMsg").html("<div class='alert alert-success'><strong>Done !</strong> Entry saved successfully.</div>");
                $("#MenuMsg").fadeOut(4000);
            } else {
                $("#MenuMsg").fadeIn();
                $("#MenuMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Menu entry.</div>");
                $("#MenuMsg").fadeOut(4000);
            }
            $(window).scrollTop("#MenuMsg");
        });
    };
    $scope.SelectMainLocation = function (data) {
        $scope.MenuFormData.LocationtName = data.LocationName;
        $scope.MenuFormData.LocationId = data.LocationId;
        $scope.MainLocationDropdown = true;
    };
    var k = 0;
    $scope.AddProduct = function (data) {
        $scope.ProductDropdown = true;
        $scope.getProductChildList(data);
        $scope.ProductData[k] = data;
        k++;
    };
    var ChildProductList = [];
    $scope.getProductChildList = function (data) {
        var flag = false;
        if ($scope.ProductChildList.length > 0) {
            for (var i = 0; i < $scope.ProductChildList.length; i++) {
                if ($scope.ProductChildList[i].productId === data.productId) {
                    flag = true;
                } else {
                    flag = false;
                }
            }
        }
        if (!flag) {
            ChildProductList.push(data);
            $scope.ProductChildList = ChildProductList;
        } else {
            alert('Product is already exists');
        }
    };
    $scope.MenuFormReset = function () {
        $("#MenuForm").trigger("reset");
    };
    $scope.MenuFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.MenuForm.$valid) {
            $scope.MenuNameRequired = false;
            return true;
        } else {
            if ($scope.MenuForm.MenuName.$invalid) {
                $scope.MenuNameRequired = true;
            }
            return false;
        }
    };
    $scope.ChangeLayerCount = function(id){
        if($scope.IsMultilayered[id] == 0){
            $scope.LayerCount[id] = 0;
        }
    };
    $scope.CheckMultilayeredFlag = function(id){
        if($scope.IsMultilayered[id] == 0){
            alert("Allowed only for multi-layer cakes.");
            $scope.LayerCount[id] = 0;
        }
    };
});
app.controller("MainLocationController", function ($scope, $http, $rootScope) {
    $scope.FormData = {};
    $scope.LocCityDropdown = true;
    $scope.GetLocations = function () {
        $http({
            method: 'get',
            url: 'api/master/LocationMaster/getLocations.php'
        }).then(function successCallback(response) {
            $scope.Locations = response.data;
        });
    };
    $scope.GetLocations();
    $scope.LocSearchCity = function (data, result) {
        if (data) {
            if ($scope.LocationSearch(data, result)) {
                $scope.LocCityDropdown = false; // Location found in existing list
                $("#LocMsg").html("");
            } else {

                $scope.LocCityDropdown = true;  // Location is not found in existing list
                $("#LocMsg").html("<div style='color:red'><strong>Sorry !</strong> City not found. <a href='#LocationModal' role='button' data-toggle='modal'>Add City</a></div>");
            }
        } else {
            $scope.LocCityDropdown = true;  // blank textbox
            $("#LocMsg").html("");
        }
    };
    $scope.LocationSearch = function (string, result) {
        var SearchFlag = false;
        if (string !== null && result.length === 0) {
            SearchFlag = false;
        } else {
            SearchFlag = true;
        }
        return SearchFlag;
    };
    $scope.FillTextboxLocCity = function (string) {

        $scope.LocCity = string.CityName;
        $scope.FormData.LocCountryId = string.CountryId;
        $scope.FormData.LocCityId = string.CityId;
        $scope.FormData.LocStateId = string.StateId;
        $scope.LocCityDropdown = true;
    };
    $scope.MainLocationSave = function () {
        $http.post(
                "api/master/LocationMaster/addMainLocation.php",
                {'FormData': $scope.FormData}
        ).then(function successCallback(response) {
            if (parseInt(response.data)) {
                $rootScope.GetMainLocations();
                $("#MainLocationMsg").fadeIn();
                $("#MainLocationMsg").html("<div class='alert alert-success'><strong>Done !</strong> Entry saved successfully.</div>");
                $("#MainLocationMsg").fadeOut(4000);
                $("#MainLocationModal").toggle();
                $("#MainLocationModal").trigger("reset");
            } else {
                $("#MainLocationMsg").fadeIn();
                $("#MainLocationMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Location entry.</div>");
                $("#MainLocationMsg").fadeOut(4000);
            }
        });
    };
    $scope.MainLocationFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.MainLocationForm.$valid) {
            $scope.LocationNameRequired = false;
            return true;
        } else {
            if ($scope.FormData.LocationName.$invalid) {
                $scope.LocationNameRequired = true;
            }
            return false;
        }
    };
});
app.controller("TeamController", function ($scope, $http, $rootScope) {

    $scope.FormData = {};
    $scope.TeamSave = function () {
        $http.post(
                "api/master/others/Teams/AddTeam.php",
                {'FormData': $scope.FormData}
        ).then(function successCallback(response) {
            // Store response data
            if (response.data) {
                $scope.$emit("ReloadTeams");
                $scope.FormData = null;
                $('#TeamModal').modal('toggle'); //or  $('#IDModal').modal('hide');
            } else {
                $("#TeamMsg1").fadeIn();
                $("#TeamMsg1").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Team entry.</div>");
                $("#TeamMsg1").fadeOut(4000);

            }
        });
    };
    $scope.TeamFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.TeamForm.$valid) {
            $scope.TeamNameRequired = false;
            return true;
        } else {
            if ($scope.TeamForm.TeamName.$invalid) {
                $scope.TeamNameRequired = true;
            }
            return false;
        }
    };
});
app.controller("SubMenuController", function ($scope, $http, $rootScope) {

    $scope.SubMenuFormData = {};
    $scope.SubMenuSave = function () {
        $http.post(
                "api/master/MenuManagement/addSubmenu.php",
                {'SubMenuFormData': $scope.SubMenuFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $scope.$emit("ReloadSubMenus");
                $('#SubMenuModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#SubMenuForm").trigger("reset");
            } else {
                $("#SubMenuMsg").fadeIn();
                $("#SubMenuMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Submenu entry.</div>");
                $("#SubMenuMsg").fadeOut(4000);

            }
        });
    };
    $scope.SubMenuFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.SubMenuForm.$valid) {
            $scope.SubMenuNameRequired = false;
            return true;
        } else {
            if ($scope.SubMenuForm.SubMenuName.$invalid) {
                $scope.SubMenuNameRequired = true;
            }
            return false;
        }
    };
});
app.controller("ForcedQuestionChildController", function ($scope, $http, $rootScope) {

    $scope.ForcedQuestionChildFormData = {};
    $scope.ForcedQuestionChildSave = function () {
        $http.post(
                "api/master/MenuManagement/addChildQuestion.php",
                {'ForcedQuestionChildFormData': $scope.ForcedQuestionChildFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $('#ForcedQuestionChildModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#ForcedQuestionChildForm").trigger("reset");
            } else {
                $("#ForcedQuestionChildMsg").fadeIn();
                $("#ForcedQuestionChildMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved entry.</div>");
                $("#ForcedQuestionChildMsg").fadeOut(4000);

            }
        });
    };
    $scope.ForcedQuestionChildFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.ForcedQuestionChildForm.$valid) {
            $scope.ForcedQuestionIdRequired = false;
            $scope.ProductIdRequired = false;
            return true;
        } else {
            if ($scope.ForcedQuestionChildForm.ForcedQuestionId.$invalid) {
                $scope.ForcedQuestionIdRequired = true;
            }
            if ($scope.ForcedQuestionChildForm.ProductId.$invalid) {
                $scope.ProductIdRequired = true;
            }
            return false;
        }
    };
});
app.controller("QuestionController", function ($scope, $http, $rootScope) {

    $scope.QuestionFormData = {};
    $scope.QuestionSave = function () {
        $http.post(
                "api/master/MenuManagement/addQuestion.php",
                {'QuestionFormData': $scope.QuestionFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $scope.$emit("ReloadForcedQuestion");
                $('#QuestionModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#QuestionForm").trigger("reset");
            } else {
                $("#QuestionMsg").fadeIn();
                $("#QuestionMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved Question entry.</div>");
                $("#QuestionMsg").fadeOut(4000);

            }
        });
    };
    $scope.QuestionFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.QuestionForm.$valid) {
            $scope.QuestionNameRequired = false;
            return true;
        } else {
            if ($scope.QuestionForm.QuestionName.$invalid) {
                $scope.QuestionNameRequired = true;
            }
            return false;
        }
    };
});
app.controller("ModifierChildController", function ($scope, $http, $rootScope) {

    $scope.ModifierChildFormData = {};
    $scope.GetRawProducts = function () {
        $http({
            method: 'get',
            url: 'api/master/others/ProductManagement/getRawProducts.php'
        }).then(function successCallback(response) {
            $scope.RawProducts = response.data;
        });
    };
    $scope.GetRawProducts();
    $scope.ModifierChildSave = function () {
        $http.post(
                "api/master/MenuManagement/addChildModifier.php",
                {'ModifierChildFormData': $scope.ModifierChildFormData}
        ).then(function successCallback(response) {
            // Store response data

            if (parseInt(response.data)) {
                $('#ModifierChildModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#ModifierChildForm").trigger("reset");
            } else {
                $("#ModifierChildMsg").fadeIn();
                $("#ModifierChildMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved entry.</div>");
                $("#ModifierChildMsg").fadeOut(4000);
            }
        });
    };
    $scope.ModifierChildFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.ModifierChildForm.$valid) {
            $scope.ModifierIdRequired = false;
            $scope.ProductIdRequired = false;
            return true;
        } else {
            if ($scope.ModifierChildForm.ModifierId.$invalid) {
                $scope.ModifierIdRequired = true;
            }
            if ($scope.ModifierChildForm.ProductId.$invalid) {
                $scope.ProductIdRequired = true;
            }
            return false;
        }
    };
});
app.controller("ModifierController", function ($scope, $http, $rootScope) {

    $scope.ModifierFormData = {};
    $scope.ModifierSave = function () {
        $http.post(
                "api/master/MenuManagement/addMasterModifier.php",
                {'ModifierFormData': $scope.ModifierFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $scope.$emit("ReloadMasterModifiers");
                $('#ModifierModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#ModifierForm").trigger("reset");
            } else {
                $("#ModifierMsg").fadeIn();
                $("#ModifierMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved entry.</div>");
                $("#ModifierMsg").fadeOut(4000);

            }
        });
    };
    $scope.ModifierFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.ModifierForm.$valid) {
            $scope.ModifierNameRequired = false;
            return true;
        } else {
            if ($scope.ModifierForm.ModifierName.$invalid) {
                $scope.ModifierNameRequired = true;
            }
            return false;
        }
    };
});
app.controller("FlavorChildController", function ($scope, $http, $rootScope) {

    $scope.FlavorChildFormData = {};
    $scope.FlavorChildSave = function () {
        $http.post(
                "api/master/MenuManagement/addChildFlavor.php",
                {'FlavorChildFormData': $scope.FlavorChildFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $('#FlavorChildModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#FlavorChildForm").trigger("reset");
            } else {
                $("#FlavorChildMsg").fadeIn();
                $("#FlavorChildMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved entry.</div>");
                $("#FlavorChildMsg").fadeOut(4000);

            }
        });
    };
    $scope.FlavorChildFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.FlavorChildForm.$valid) {
            $scope.FlavorIdRequired = false;
            $scope.ProductIdRequired = false;
            return true;
        } else {
            if ($scope.FlavorChildForm.FlavorId.$invalid) {
                $scope.FlavorIdRequired = true;
            }
            if ($scope.FlavorChildForm.ProductId.$invalid) {
                $scope.ProductIdRequired = true;
            }
            return false;
        }
    };
});
app.controller("FlavorController", function ($scope, $http, $rootScope) {

    $scope.FlavorFormData = {};
    $scope.FlavorSave = function () {
        $http.post(
                "api/master/MenuManagement/addFlavor.php",
                {'FlavorFormData': $scope.FlavorFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $scope.$emit("ReloadFlavors");
                $('#FlavorModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                $("#FlavorForm").trigger("reset");
            } else {
                $("#FlavorMsg").fadeIn();
                $("#FlavorMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Reserved entry.</div>");
                $("#FlavorMsg").fadeOut(4000);

            }
        });
    };
    $scope.FlavorFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.FlavorForm.$valid) {
            $scope.FlavorNameRequired = false;
            return true;
        } else {
            if ($scope.FlavorForm.FlavorId.$invalid) {
                $scope.FlavorIdRequired = true;
            }
            return false;
        }
    };
});