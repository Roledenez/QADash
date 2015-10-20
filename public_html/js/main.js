/**
 * Created by Roledene JKS on 10/20/2015.
 */

var app = angular.module('test', []);
app.controller('FirstCtrl', function ($scope) {
    $scope.data = {message: "Hello World"};
});

app.controller('RestData', function ($scope, $http) {
    $http.get('http://rest-service.guides.spring.io/greeting').
        success(function (data) {
            $scope.greeting = data;
        });
    $scope.test = "test text";
});


app.service('dataService', function ($http) {
    delete $http.defaults.headers.common['X-Requested-With'];
    this.getData = function (callbackFunc) {
        $http({
            method: 'GET',
            url: 'http://rest-service.guides.spring.io/greeting'
            //params: 'limit=10, sort_by=created:desc',
            //headers: {'Authorization': 'Token token=xxxxYYYYZzzz'}
        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function (data) {
            alert("error");
            callbackFunc(data)
        });
    }
});

app.controller('AngularJSCtrl', function ($scope, dataService) {
    $scope.data = null;
    dataService.getData(function (dataResponse) {
        $scope.data = dataResponse;
    });
});

app.controller('customersCtrl', function ($scope, $http) {
    $http.get("http://localhost:82/QADash/public_html/admin/project/getProjects")
        .success(function (response) {
            $scope.names = response;
            //console.log(response);
        });

    $scope.setCurrent = function (item) {
        //console.log('this works');
        console.log(item);
    }
});