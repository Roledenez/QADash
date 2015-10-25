<h2>Admin Dashboard</h2>

<div ng-app="test" ng-controller="FirstCtrl">
    <input type="text" ng-model="search"/>
    <input type="text" ng-model="data.message"/>

    <p>{{search}}</p>

    <p>{{data.message}}</p>


    <h2>RestData--></h2>
    <!--    <div ng-controller="AngularJSCtrl">-->
    <!--        <p>The ID is {{data.id}}</p>-->
    <!--        <p>The content is {{data.content}}</p>-->
    <!--        <p>The test text is {{test}}</p>-->
    <!--        <p>The test text is {{greeting}}</p>-->
    <!--    </div>-->

    <div ng-app="myApp" ng-controller="customersCtrl">

        <ul>
            <li ng-repeat="x in names">
                {{ x.name }}
            </li>
        </ul>

        <select ng-model="selectedAttorney">
            <option ng-repeat="x in names"
            <!--                title="{{x.name}}"-->
            <!--                ng-selected="{{attorney.id == selectedAttorney.id}}"-->
            <!--                ng-selected="{{x.name == x.name}}" -->
            value="1" > {{x.name}}
            </option>
        </select>

        <select ng-model="selectedProject">
            <option ng-repeat="x in names" selected="true" value="{{x.name}}">{{x.name}}</option>
        </select>
        {{selectedProject}}
    </div>


</div>