/**
 * Created by Roledene JKS on 10/20/2015.
 */

var app = angular.module('header', []);
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
    $http.get(base_url + "admin/project/getProjects")
        .success(function (response) {
            $scope.names = response;
            //console.log(response);
        });

    $scope.setCurrent = function (item) {
        //console.log('this works');
        console.log(item);
    }
});

app.controller('unreadNotificationCtrl', function ($scope, $http) {
    $http.get(base_url + "engineer/notification/getUnreadNotifications")
        .success(function (response) {
            $scope.notifications = response;
            //console.log(response);
        });

    $scope.readNotification = function () {
        $http.get(base_url + "engineer/notification/readNotification")
            .success(function (response) {
                $scope.notifications = response;
                //console.log(response);
            });
    }

});

//var appBody = angular.module('header', []);
app.controller('getAllNotificationByUserCtrl', function ($scope, $http) {
    $http.get(base_url + "engineer/notification/getAllNotificationsByUser")
        .success(function (response) {
            $scope.notifications = response;
            //console.log(response);
        });

});

app.controller('getAllNotificationByProjectCtrl', function ($scope, $http) {
    $http.get(base_url + "engineer/notification/getAllNotificationsByProject")
        .success(function (response) {
            $scope.notifications = response;
        });

});

app.controller('getUnreadChatCtrl', function ($scope, $http) {
    $http.get(base_url + "engineer/chat/getUnreadChats")
        .success(function (response) {
            $scope.chats = response;
        });

});

