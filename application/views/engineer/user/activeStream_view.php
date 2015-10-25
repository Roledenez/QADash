<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Users Active Stream</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">usersActiveStream</li>
    </ol>
</section>

<div class="table-responsive mailbox-messages" ng-app="test">
    <table class="table table-hover table-striped" ng-controller="getAllNotificationByUserCtrl">
        <tbody>
        <tr ng-repeat="n in notifications">
            <!--            <td><input type="checkbox" /></td>-->
            <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
            <td class="mailbox-name"><a href="{{n.navigate_url}}">{{n.title}}</a></td>
            <td class="mailbox-subject"><b>{{n.status}}</b> - {{n.notification}}</td>
            <td class="mailbox-attachment"></td>
            <td class="mailbox-date">{{n.time}}</td>
        </tr>
        </tbody>
    </table>
    <!-- /.table -->
</div><!-- /.mail-box-messages -->