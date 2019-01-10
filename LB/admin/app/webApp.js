var app = angular.module('webApp', []);
app.factory('CartService', function ($rootScope, $http) {
    var count = {};
    count.getcount = function () {
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getCartItems.php'
        }).then(function successCallback(response) {
            $rootScope.ItemCount = response.data.length;
        });
    };
    return count;
});

app.controller('HeaderController', function ($scope, $http) {
    $scope.CheckLogin = function () {
        $http({
            method: 'get',
            url: 'admin/api/master/UserManagement/checkSession.php'
        }).then(function successCallback(response) {
                $scope.LoginUser = response.data.code;
        });
    };
    $scope.CheckLogin();
});
app.controller('HomeController', function ($scope, $http, $compile, CartService) {
    CartService.getcount();
    $scope.HomeActive = "active";
    $scope.Submenu = [];
    $scope.RightArrow = [];
    $scope.MainLocationDropdown = true;
    $scope.LocationId = 0;
    $scope.GetMenus = function () {
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getMenus.php'
        }).then(function successCallback(response) {
            $compile($("#Menu").html(response.data))($scope);
        });
    };
    $scope.GetMenus();
    $scope.LoadProduct = function (id) {
        $http.post(
                "admin/api/WebComponents/getProducts.php",
                {'pid': id}
        ).then(function successCallback(response) {
            $scope.Products = response.data;
            if ($scope.Products.length === 0) {
                $("#Products").html("<div style='padding:4em'>Sorry ! Products not found.</div>");
            } else {
                $("#Products").html("");
            }
        });
    };
    $scope.SetLocation = function (id) {
        $http.post(
                "admin/api/WebComponents/setLocation.php",
                {'LocationId': id}
        ).then(function successCallback(response) {
            $scope.LoadProduct(0);
        });
    };
    $scope.SetLocation($scope.LocationId);
    $scope.MenuSearch = function (string, result) {
        var SearchFlag = false;
        if (string !== null && result.length === 0) {
            SearchFlag = false;
        } else {
            SearchFlag = true;
        }
        return SearchFlag;
    };
    $scope.GetMainLocations = function () {
        $http({
            method: 'get',
            url: 'admin/api/master/LocationMaster/getMainLocations.php'
        }).then(function successCallback(response) {
            $scope.MainLocations = response.data;
        });
    };
    $scope.GetMainLocations();
    $scope.LoadProduct(0);
    $scope.MainLocationSearch = function (string) {
        if (string) {
            if ($scope.MenuSearch(string, $scope.MainLocationSearchResult)) {
                $scope.MainLocationDropdown = false; // Location found in existing list
                $("#MainLocationMsg").html("");
            } else {
                $scope.MainLocationDropdown = true;  // Location is not found in existing list
                $("#MainLocationMsg").html("<ul class='list-group'><li class='list-group-item'><strong>Sorry !</strong> Location not found.</li>");
            }
        } else {
            $scope.MainLocationDropdown = true;  // hide search result
            $("#MainLocationMsg").html("");// hide error message
        }
    };
    $scope.SelectMainLocation = function (data) {
        $scope.LocationtName = data.LocationName;
        $scope.LocationId = data.LocationId;
        $scope.MainLocationDropdown = true;
    };
});
app.controller('AboutusController', function ($scope, $http, CartService) {
    CartService.getcount();
    $scope.AboutusActive = "active";
    //alert("Working");
});
app.controller('ProductsController', function ($scope, $http, $compile, CartService) {
    CartService.getcount();
    $scope.ProductsActive = "active";
    $scope.Submenu = [];
    $scope.RightArrow = [];
    $scope.MainLocationDropdown = true;
    $scope.GetMenus = function () {
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getMenus.php'
        }).then(function successCallback(response) {
            $compile($("#Menu").html(response.data))($scope);
        });
    };
    $scope.GetMenus();
    $scope.LoadProduct = function (id) {
        $http.post(
                "admin/api/WebComponents/getProducts.php",
                {'pid': id}
        ).then(function successCallback(response) {
            $scope.Products = response.data;
            if ($scope.Products.length === 0) {
                $("#Products").html("<div style='padding:4em'>Sorry ! Products not found.</div>");
            } else {
                $("#Products").html("");
            }
        });
    };
    $scope.LoadProduct(0);
});
app.controller('ServicesController', function ($scope, $http, CartService) {
    CartService.getcount();
    $scope.ServicesActive = "active";
    //alert("Working");
});
app.controller('LoginController', function ($scope, $http, CartService) {
    CartService.getcount();
    $scope.LoginActive = "active";
    $scope.UserFormData = {};
    $scope.LoginUserFormData = {};
    $scope.UserSave = function () {
        $http.post(
                "admin/api/master/UserManagement/addUser.php",
                {'UserFormData': $scope.UserFormData}
        ).then(function successCallback(response) {
            // Store response data
            if (parseInt(response.data)) {
                $("#UserRegistrationMsg").fadeIn();
                $("#UserRegistrationMsg").html("<div class='alert alert-success'><strong>Done !</strong> Registration successfully.</div>");
                $("#UserRegistrationMsg").fadeOut(5000);
                $("#UserForm").trigger("reset");
            } else {
                $("#UserRegistrationMsg").fadeIn();
                $("#UserRegistrationMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> User already exists.</div>");
                $("#UserRegistrationMsg").fadeOut(5000);

            }
        });
    };
    $scope.LoginUser = function () {
        var baseUrl = (window.location).href;
        var cid = baseUrl.split('ci=').pop();
        $http.post(
                "admin/api/master/UserManagement/loginUser.php",
                {'LoginUserFormData': $scope.LoginUserFormData}
        ).then(function successCallback(response) {
            if (response.data.code === 200) {
                if (cid === "ccsdSDd87sdasd23dsd23dw") {
                    window.location = 'checkout.html?fill=1';
                } else if (cid === "cchsdSDd87sdasd23dsd23dw") {
                    window.location = 'customized-checkout.html?fill=2';
                } else {
                    window.location = 'user.html';
                }
            } else {
                $("#LoginUserMsg").fadeIn();
                $("#LoginUserMsg").html("<div class='alert alert-danger'><strong>Sorry !</strong> Invalid Username or Password.</div>");
                $("#LoginUserMsg").fadeOut(5000);
            }
        });
    };
    $scope.UserFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.UserForm.$valid) {
            $scope.firstnameRequired = false;
            $scope.lastnameRequired = false;
            $scope.PasswordRequired = false;
            $scope.UserEmailIdRequired = false;
            $scope.UserMobileNoRequired = false;
            return true;
        } else {
            if ($scope.UserForm.firstname.$invalid) {
                $scope.firstnameRequired = true;
            }
            if ($scope.UserForm.lastname.$invalid) {
                $scope.lastnameRequired = true;
            }
            if ($scope.UserForm.Password.$invalid) {
                $scope.UserPasswordRequired = true;
            }
            if ($scope.UserForm.Email.$invalid) {
                $scope.UserEmailIdRequired = true;
            }
            if ($scope.UserForm.Mobile.$invalid) {
                $scope.UserMobileNoRequired = true;
            }
            return false;
        }
    };
    $scope.LoginUserFormValidate = function ($event) {
        $event.preventDefault();
        if ($scope.LoginUserForm.$valid) {
            $scope.LoginUserNameRequired = false;
            $scope.LoginUserPasswordRequired = false;
            return true;
        } else {
            if ($scope.LoginUserForm.LoginUserName.$invalid) {
                $scope.LoginUserNameRequired = true;
            }
            if ($scope.LoginUserForm.LoginUserPassword.$invalid) {
                $scope.LoginUserPasswordRequired = true;
            }
            return false;
        }
    };
});
app.controller('MailController', function ($scope, $http, CartService) {
    CartService.getcount();
    $scope.ContactActive = "active";
    //alert("Working");
});
app.controller('CheckoutController', function ($scope, $http, CartService) {

    CartService.getcount();
    $scope.Items = [];
    $scope.AreaDropdown = true;
    $scope.CartDetails = false;
    $scope.Checkout = true;
    $scope.CheckoutControl = false;
    $scope.CartFormData = {};
    $scope.CartFormData.DeliveryCharge = 0;

    $scope.getCartProducts = function () {
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getCartItems.php'
        }).then(function successCallback(response) {
            if (response.data.length === 0) {
                $scope.ItemMsg = response.data.length + " Products.";
                $scope.CheckoutControl = true;
                $("#EmptyCart").html("<tr><td colspan='7' style='color:red'>Your shopping cart is empty.</td><tr>");
            } else {
                $scope.ItemMsg = response.data.length + " Products.";
                $scope.Items = response.data;
            }
            $scope.CartFormData.GrandTaxTotal = $scope.TaxSum();
            $scope.CartFormData.Quantity = $scope.Items.length;
            $scope.CartFormData.GrandTotal = $scope.sum();
            $scope.CartFormData.TotalAmount = $scope.TotalAmount();
            $scope.CartFormData.TotalDiscount = $scope.TotalDiscount();
        });
    };
    
    $scope.getCartProducts();
    $scope.Search = function (string, result) {
        var SearchFlag = false;
        if (string !== null && result.length === 0) {
            SearchFlag = false;
        } else {
            SearchFlag = true;
        }
        return SearchFlag;
    };
    $scope.AreaSearch = function (string) {
        if (string) {
            if ($scope.Search(string, $scope.AreaSearchResult)) {
                $scope.AreaDropdown = false; // Location found in existing list
                $("#AreaMsg").html("");
            } else {
                $scope.AreaDropdown = true; // Location is not found in existing list
                $("#AreaMsg").html("<ul class='list-group'><li class='list-group-item'><strong>Sorry !</strong> Area not found.</li>");
            }
        } else {
            $scope.AreaDropdown = true; // hide search result
            $("#AreaMsg").html(""); // hide error message
        }
    };
    $scope.getAreas = function () {
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getAreas.php'
        }).then(function successCallback(response) {
            $scope.Areas = response.data;
        });
    };
    $scope.getAreas();
    $scope.clearCart = function () {
        var confirmMsg = confirm("Are you sure ! Remove cart items ?");
        if (confirmMsg) {
            $http({
                method: 'get',
                url: 'admin/api/WebComponents/emptyCart.php'
            }).then(function successCallback(response) {
                $scope.getCartProducts();
                CartService.getcount();
                $scope.Items = [];
                $scope.sum();
                $scope.CartFormData.DeliveryCharge = 0;
            });
        } else {
            return false;
        }
    };
    $scope.AddQuantity = function (data) {
        for (var i = 0; i < $scope.Items.length; i++) {
            if ($scope.Items[i].productId === data.productId) {
                data.Quantity = parseInt($scope.Items[i].Quantity) + parseInt(1);
                $scope.sum();
                break;
            }
        }
        $scope.CartFormData.GrandTaxTotal = $scope.TaxSum();
        $scope.CartFormData.Quantity = $scope.Items.length;
        $scope.CartFormData.GrandTotal = $scope.sum();
        $scope.CartFormData.TotalAmount = $scope.TotalAmount();
        $scope.CartFormData.TotalDiscount = $scope.TotalDiscount();
        $scope.CartFormData.AreaName = '';
    };
    $scope.RemoveQuantity = function (data) {
        for (var i = 0; i < $scope.Items.length; i++) {
            if ($scope.Items[i].productId === data.productId) {
                if (data.Quantity !== 1) {
                    data.Quantity = parseInt($scope.Items[i].Quantity) - parseInt(1);
                    $scope.sum();
                    break;
                }
            }
        }
        $scope.CartFormData.GrandTaxTotal = $scope.TaxSum();
        $scope.CartFormData.Quantity = $scope.Items.length;
        $scope.CartFormData.GrandTotal = $scope.sum();
        $scope.CartFormData.TotalAmount = $scope.TotalAmount();
        $scope.CartFormData.TotalDiscount = $scope.TotalDiscount();
        $scope.CartFormData.AreaName = '';
    };
    $scope.sum = function () {
        var total = 0;
        if ($scope.Items.length > 0) {
            for (var i = 0; i < $scope.Items.length; i++) {
                if ($scope.Items[i].IncludedInRate == 1) {
                    total += ($scope.Items[i].Rate - $scope.Items[i].ProductDIscount) * $scope.Items[i].Quantity;
                } else {
                    total += ($scope.Items[i].Rate - $scope.Items[i].ProductDIscount + parseFloat($scope.Items[i].TaxAmount)) * $scope.Items[i].Quantity;
                }

            }
        }

        return (total + parseFloat($scope.CartFormData.DeliveryCharge)).toFixed(2);
    };
    $scope.TotalAmount = function () {
        var total = 0;
        for (var i = 0; i < $scope.Items.length; i++) {
            total += ($scope.Items[i].Rate - $scope.Items[i].ProductDIscount) * $scope.Items[i].Quantity;
        }
        return total.toFixed(2);
    };
    $scope.TotalDiscount = function () {
        var total = 0;
        for (var i = 0; i < $scope.Items.length; i++) {
            total += $scope.Items[i].ProductDIscount * $scope.Items[i].Quantity;
        }
        return total.toFixed(2);
    };
    $scope.TaxSum = function () {
        var TaxTotal = 0;
        var temp = 0;
        if ($scope.Items.length > 0) {
            for (var i = 0; i < $scope.Items.length; i++) {
                if ($scope.Items[i].IncludedInRate == 1) {
                    temp += parseFloat($scope.Items[i].TaxAmount * $scope.Items[i].Quantity);
                    continue;
                } else {
                    temp += parseFloat($scope.Items[i].TaxAmount * $scope.Items[i].Quantity);
                    TaxTotal += $scope.Items[i].TaxAmount * $scope.Items[i].Quantity;
                }
            }
        }
        $scope.GrandTaxTotal = temp + parseFloat($scope.CartFormData.DeliveryCharge);
        return TaxTotal.toFixed(2);
    };
    $scope.SelectArea = function (data) {
        $scope.CartFormData.AreaName = data.AreaName;
        $scope.AreaDropdown = true;
        if (data.MinAmount >= $scope.GrandTotal) {
            $("#ErrorMsg").html("<div class='alert alert-danger'>Minimum Order " + data.MinAmount + " AED For " + data.AreaName + "</div>");
            $("#Submit").attr("disabled", true);
            $('#Submit').css('cursor', 'not-allowed');
        } else {
            $scope.CartFormData.DeliveryCharge = data.DeliveryCharges;
            $scope.CartFormData.GrandTotal = $scope.sum();
            $("#ErrorMsg").html("");
            $("#Submit").attr("disabled", false);
            $('#Submit').css('cursor', 'pointer');
        }
    };
    $scope.removeItem = function (id) {
        $http.post(
                "admin/api/WebComponents/removeProduct.php",
                {'pid': id}
        ).then(function successCallback(response) {
            CartService.getcount();
            $scope.getCartProducts();
            $scope.sum();
        });
    };
    $scope.validateForm = function () {
        if ($scope.CartFormData.CustomerName == null) {
            return false;
        } else if ($scope.CartFormData.Mobile == null) {
            return false;
        } else if ($scope.CartFormData.Email == null) {
            return false;
        } else if ($scope.CartFormData.Address == null) {
            return false;
        } else if ($scope.CartFormData.Address3 == null) {
            return false;
        } else if ($scope.CartFormData.DeliveryDate == null) {
            return false;
        } else if ($scope.CartFormData.TimeSlot == null) {
            return false;
        } else {
            $scope.Proceed();
        }
    };

    $scope.Proceed = function () {
        $http.post(
                "admin/api/WebComponents/PlaceOrder.php",
                {'CartFormData': $scope.CartFormData, 'CartItems': $scope.Items}
        ).then(function successCallback(response) {
            if (parseInt(response.data)) {
                $http({
                    method: 'get',
                    url: 'admin/api/WebComponents/emptyCart.php'
                }).then(function successCallback(response) {
                    $scope.getCartProducts();
                    CartService.getcount();
                    $scope.Items = [];
                    $scope.sum();
                    $scope.CartFormData.DeliveryCharge = 0;
                    window.location = "success.html";
                });
            } else {
                window.location = "failure.html";
            }
        });
    };

    $scope.checkout = function () {
        $http({
            method: 'get',
            url: 'admin/api/master/UserManagement/checkSession.php'
        }).then(function successCallback(response) {
            if (response.data.code === 401) {
                alert("Login required !");
                window.location = 'login.html?ci=ccsdSDd87sdasd23dsd23dw';
            } else {
                $scope.UserDetails = response.data;
                var area = $("#AreaName").val();
                var flag = false;
                for (var i = 0; i <= $scope.Areas.length; i++) {
                    if (area === $scope.Areas[i].AreaName) {
                        flag = true;
                        break;
                    }
                }
                if (!flag) {
                    $("#AreaName").trigger("required");
                } else {
                    $scope.CartFormData.Username = $scope.UserDetails.username;
                    $scope.CartFormData.CustomerName = $scope.UserDetails.first_name + " " + $scope.UserDetails.last_name;
                    $scope.CartFormData.Mobile = parseInt($scope.UserDetails.mobile);
                    $scope.CartFormData.Email = $scope.UserDetails.email;
                    $scope.CartFormData.Address = $scope.UserDetails.address1;
                    $scope.CartFormData.Address2 = $scope.UserDetails.address2;
                    $scope.CartFormData.Address3 = $scope.UserDetails.address3;
                    $(window).scrollTop("#checkout");
                    $scope.CartDetails = true;
                    $scope.Checkout = false;
                }
            }
        });
    };
    $scope.back = function () {
        $(window).scrollTop("#checkout");
        $scope.Checkout = true;
        $scope.CartDetails = false;
    };
    $scope.LoadTimeSlots = function (date) {
        $http.post(
                "admin/api/WebComponents/getTimeSlots.php",
                {date: date}
        ).then(function successCallback(response) {
            $scope.TimeSlots = response.data;
        });
    };
});
app.controller('PaymentController', function ($scope, $http, CartService) {
    CartService.getcount();
    //alert("Working");
});
app.controller('FAQsController', function ($scope, $http, CartService) {
    CartService.getcount();
    //alert("Working");
});
app.controller('ProductDetailsController', function ($scope, $http, CartService) {
    CartService.getcount();
    var OriginalPrice;

    var baseUrl = (window.location).href;
    var id = baseUrl.split('id=').pop();

    $scope.ShowFlavors = false;
    $scope.ShowModifiers = false;
    $scope.ShowTypes = false;

    var UniqueId = Math.floor((Math.random() * 100000000000) + 12000);
    $scope.getSingleProduct = function (pid) {
        $http.post(
                "admin/api/WebComponents/getSingleProduct.php",
                {id: pid}
        ).then(function successCallback(response) {
            if (response.data.code !== 404) {
                $scope.Item = response.data;
                $scope.Item.Quantity = 1;
                $scope.Item.chid = 0;
                OriginalPrice = $scope.Item.Rate;
                if (response.data.Questions !== null) {
                    $scope.ShowTypes = true;
                    if (response.data.Questions.length > 0) {
                        for (var j = 0; j <= response.data.Questions.length - 1; j++) {
                            if (response.data.Questions[j].EnforceAnswer == 1) {
                                $('#Questions' + j).prop('required', true);
                            }
                        }
                    }
                }
                if ($scope.Item.Flavors.ChildFlavors.length > 0) {
                    $scope.ShowFlavors = true;
                }
                if ($scope.Item.ModifierId != 0) {
                    $scope.getModifires($scope.Item.ModifierId);
                    $scope.ShowModifiers = true;
                }
            } else {
                $("#msg").html("<div class='alert alert-danger'><strong>Sorry ! </strong>" + response.data.message + "</div>");
            }
        });
    };

    $scope.getSingleProduct(id);
    $scope.getModifires = function (pid) {
        if (pid) {
            $http.post(
                    "admin/api/WebComponents/getModifier.php",
                    {'mid': pid}
            ).then(function successCallback(response) {
                $scope.Modifiers = response.data;
            });
        }
    };
    $scope.validate = function (data, flag, e) {
        data.ModifierFlagId = UniqueId;
        var found = true;
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getCartItems.php'
        }).then(function successCallback(response) {
            if (response.data.length > 0) {
                for (var i = 0; i < response.data.length; i++) {
                    if (response.data[i].ModifierChildId === data.ModifierChildId && flag === 0) {
                        found = true;
                        alert("Already product in cart.");
                        break;
                    } else if (response.data[i].productId === data.productId && flag === 1) {
                        found = true;
                        alert("Already product in cart.");
                        break;
                    } else {
                        found = false;
                    }
                }
            } else {
                if (flag == 0) {
                    alert("Please add product first.");
                    return false;
                } else {
                    found = false;
                }
            }
            if (!found) {
                $scope.AddToCart(data);
            }
        });
    };

    $scope.AddToCart = function (data) {
        $http.post(
                "admin/api/WebComponents/addCart.php",
                {'CartItem': data}
        ).then(function successCallback(response) {
            $scope.ItemCount = response.data;
        });
    };
    $scope.FRate = 0;
    $scope.TypeSelected = function (data) {
        OriginalPrice = 0;
        var temp;
        temp = $scope.FRate;
        $scope.Item.Rate = parseInt(data.Rate) + parseInt(temp);
        $scope.Item.Quantity = data.Quantity;
        $scope.TypeRate = data.Rate;
    };
    $scope.TypeRate = 0;
    $scope.FlavorSelected = function (data) {
        var temp;
        temp = $scope.TypeRate;
        $scope.Item.Rate = parseInt(data.Rate) + parseInt(temp) + parseInt(OriginalPrice);
        $scope.FRate = data.Rate;
        $scope.FDesc = data.Discription;
    };
    $scope.redirect = function(){
        window.location = "checkout.html";
    };
});
app.controller('CustomizedProductDetailsController', function ($scope, $http, CartService) {

    CartService.getcount();
    var OriginalPrice;
    $scope.Item = {};
    $scope.Item.UserMessage;
    $scope.Item.ExampleImage;
    var baseUrl = (window.location).href;
    var id = baseUrl.split('id=').pop();
    $scope.ShowFlavors = false;
    $scope.ShowModifiers = false;
    $scope.ShowTypes = false;
    $scope.TypeRate = 0;
    var UniqueId = Math.floor((Math.random() * 100000000000) + 12000);

    $scope.getSingleProduct = function (pid) {
        $http.post(
                "admin/api/WebComponents/getSingleProduct.php",
                {id: pid}
        ).then(function successCallback(response) {
            if (response.data.code !== 404) {
                $scope.Item = response.data;
                $scope.Item.InsideChildFlavor = [];
                $scope.Item.OutsideChildFlavor = [];
                $scope.Item.ChildFlavorText = [];
                $scope.Item.ChildFlavorColor = [];
                $scope.Item.ChildFlavorFont = [];
                $scope.Item.Modifiers = [];
                $scope.Item.Quantity = 1;
                $scope.Item.chid = 1;
                OriginalPrice = $scope.Item.Rate;
                if (response.data.Questions !== null) {
                    $scope.ShowTypes = true;
                    if (response.data.Questions.length > 0) {
                        for (var j = 0; j <= response.data.Questions.length - 1; j++) {
                            if (response.data.Questions[j].EnforceAnswer == 1) {
                                $('#Questions' + j).prop('required', true);
                            }
                        }
                    }
                }
                if ($scope.Item.Flavors.ChildFlavors.length > 0) {
                    $scope.ShowFlavors = true;
                }
                if ($scope.Item.ModifierId != 0) {
                    $scope.getModifires($scope.Item.ModifierId);
                    $scope.ShowModifiers = true;
                }
            } else {
                $("#msg").html("<div class='alert alert-danger'><strong>Sorry ! </strong>" + response.data.message + "</div>");
            }
        });
    };
    $scope.getLayerCount = function (count) {
        var num = [];
        for (var i = 0; i <= count - 1; i++) {
            num.push(i);
        }
        return num;
    };
    $scope.getSingleProduct(id);
    $scope.getModifires = function (pid) {
        if (pid) {
            $http.post(
                    "admin/api/WebComponents/getModifier.php",
                    {'mid': pid}
            ).then(function successCallback(response) {
                $scope.Modifiers = response.data;
            });
        }
    };
    $scope.validate = function (data, flag) {
        data.ModifierFlagId = UniqueId;
        var found = true;
        $http({
            method: 'get',
            url: 'admin/api/WebComponents/getCartItems.php'
        }).then(function successCallback(response) {
            if (response.data.length > 0) {
                for (var i = 0; i < response.data.length; i++) {
                    if (response.data[i].ModifierChildId === data.ModifierChildId && flag === 0) {
                        found = true;
                        alert("Already product in cart.");
                        break;
                    } else if (response.data[i].productId === data.productId && flag === 1) {
                        found = true;
                        alert("Already product in cart.");
                        break;
                    } else {
                        found = false;
                    }
                }
            } else {
                if (flag == 0) {
                    alert("Please add product first.");
                    return false;
                } else {
                    found = false;
                }
            }
            if (!found) {
                $scope.AddToCart(data);
            }
        });
    };

    $scope.AddToCart = function (data) {
        $http.post(
                "admin/api/WebComponents/addCart.php",
                {'CartItem': data}
        ).then(function successCallback(response) {
            $scope.ItemCount = response.data;
        });
    };

    $scope.TypeRate = 0;
    $scope.OFRate = [];
    $scope.IFRate = [];

    $scope.TypeSelected = function (data) {
        OriginalPrice = 0;
        $scope.Item.Rate = parseInt(data.Rate) + parseFloat($scope.Total());
        $scope.Item.Quantity = data.Quantity;
        $scope.TypeRate = data.Rate;
    };

    $scope.InsideFlavorSelected = function (data, index) {
        var temp;
        temp = $scope.TypeRate;
        $scope.IFRate[index] = parseInt(data[index].Rate);
        $scope.Item.Rate = parseInt(temp) + parseInt(OriginalPrice) + $scope.Total();
    };

    $scope.OutFlavorSelected = function (data, index) {
        var temp;
        temp = $scope.TypeRate;
        $scope.OFRate[index] = parseInt(data[index].Rate);
        $scope.Item.Rate = parseInt(temp) + parseInt(OriginalPrice) + $scope.Total();
    };
    $scope.FlavorInsideSum = function () {
        var total = 0;
        for (var i = 0; i < $scope.IFRate.length; i++) {
            total += parseFloat($scope.IFRate[i]);
        }
        return total.toFixed(2);
    };
    $scope.FlavorOutsideSum = function () {
        var total = 0;
        for (var i = 0; i < $scope.OFRate.length; i++) {
            total += parseFloat($scope.OFRate[i]);
        }
        return total.toFixed(2);
    };
    $scope.Total = function () {
        return parseFloat($scope.FlavorInsideSum()) + parseFloat($scope.FlavorOutsideSum());
    };
    $scope.redirect = function(){
        window.location = "checkout.html";
    };
});
app.controller('PrivacyController', function ($scope, $http, CartService) {
    CartService.getcount();
    //alert("Working");
});
app.controller('UserController', function ($scope, $http, CartService) {
    CartService.getcount();
    $scope.UserDetails = [];
    $scope.Profile = false;
    $scope.MyOrders = true;
    $scope.UserActive = "active";
    $scope.CheckLogin = function () {
        $http({
            method: 'get',
            url: 'admin/api/master/UserManagement/checkSession.php'
        }).then(function successCallback(response) {
            if (response.data.code === 401) {
                window.location = 'login.html';
            } else {
                $scope.UserDetails = response.data;
                $scope.UserName = $scope.UserDetails.username;
                $scope.getMyorders($scope.UserDetails.username);
            }
        });
    };
    $scope.CheckLogin();
    $scope.logout = function () {
        $http({
            method: 'get',
            url: 'admin/api/master/UserManagement/Logout.php'
        }).then(function successCallback(response) {
            if (response.data.code === 401) {
                window.location = 'login.html';
            }
        });
    };
    $scope.myorders = function () {
        $scope.Profile = true;
        $scope.MyOrders = false;
    };
    $scope.profile = function () {
        $scope.Profile = false;
        $scope.MyOrders = true;
    };
    $scope.getMyorders = function (username) {
        $http.post(
                "admin/api/WebComponents/getMyOrders.php",
                {'Username': username}
        ).then(function successCallback(response) {
            if (response.data.code == 404) {
                $("#NotFound").html("<tr><td colspan='7' style='color:red'>Orders Not Found.</td></tr>");
            } else {
                $scope.OrderDetails = response.data;
            }
        });
    };
    $scope.parseDate = function (date) {
        return new Date(Date.parse(date));
    };
    $scope.ChildProduct = function (data, modifier,id) {
        $scope.id = id;
        $scope.ChildProducts = [];
        $scope.ChildProducts.push(data);
        $scope.ModifierProducts = modifier;
    };
});
app.controller('SuccessController', function ($scope, $http, CartService) {
    CartService.getcount();
    //alert("Working");
});
app.controller('FailureController', function ($scope, $http, CartService) {
    CartService.getcount();
    //alert("Working");
});


