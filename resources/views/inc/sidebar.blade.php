<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="/profile" class="media-left">
            @if(isset(Auth::user()->employee->photo))
                <img src="" width="40px" height="30px" class="img-responsive">
            @else
                <img src="/assets/img/avatars/profile_pic.png" class="img-responsive">
            @endif

        </a>

        <div class="media-body">
            <div class="media-author"><a href="/profile"></a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a  href="/dashboard">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
{{--    @if(Auth::user()->isHR())--}}
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Employees</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/employee_add">
                        <span class="glyphicon glyphicon-tags"></span> Add Employee </a>
                </li>
                <li>
                    <a href="/employee_manager">
                        <span class="glyphicon glyphicon-tags"></span> Employee Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-group"></span>
                <span class="sidebar-title">Directorate</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/directorate_add">
                        <span class="glyphicon glyphicon-book"></span> Add Directorate </a>
                </li>
                <li>
                    <a href="/directorate_list">
                        <span class="glyphicon glyphicon-book"></span> Directorate Listings </a>
                </li>
                <li>
                    <a href="/department_add">
                        <span class="glyphicon glyphicon-book"></span> Add Department </a>
                </li>
                <li>
                    <a href="/department_list">
                        <span class="glyphicon glyphicon-modal-window"></span> Department Listings </a>
                </li>
            </ul>
        </li>

        <li>

            <a href="/employee_bank_details">
                <span class="fa fa-bank"></span>
                <span class="sidebar-title">Bank Account</span>

            </a>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-graduation-cap"></span>
                <span class="sidebar-title">Roles</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/role_add">
                        <span class="glyphicon glyphicon-book"></span> Add Role </a>
                </li>
                <li>
                    <a href="/role_list">
                        <span class="glyphicon glyphicon-modal-window"></span> Role Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-graduation-cap"></span>
                <span class="sidebar-title">Targets</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/target_assign">
                        <span class="glyphicon glyphicon-book"></span> Assign Target </a>
                </li>
                <li>
                    <a href="/my_target_list">
                        <span class="glyphicon glyphicon-modal-window"></span> My Target List </a>
                </li>
                <li>
                    <a href="/target_assign_list">
                        <span class="glyphicon glyphicon-modal-window"></span> Target Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa fa-laptop"></span>
                <span class="sidebar-title">Assets</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/asset_add">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Add Asset </a>
                </li>
                <li>
                    <a href="/asset_list">
                        <span class="glyphicon glyphicon-calendar"></span> List Asset </a>
                </li>
                <li>
                    <a href="/asset_assign">
                        <span class="fa fa-desktop"></span> Assign Asset </a>
                </li>
                <li>
                    <a href="/asset_assign_list">
                        <span class="fa fa-clipboard"></span> Asset Assignment Listings </a>
                </li>
            </ul>
        </li>
{{--    @endif--}}
    <li>
        <a class="accordion-toggle" href="/dashboard">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Leaves</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="/leave_apply">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Apply Leave </a>
            </li>
            <li>
                <a href="/my_leave_list">
                    <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
            </li>

{{--            @if(\Auth::user()->isHR())--}}
                <li>
                    <a href="/leave_type_add">
                        <span class="fa fa-desktop"></span> Add Leave Type </a>
                </li>
                <li>
                    <a href="/leave_type_list">
                        <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                </li>
{{--            @endif--}}
{{--            @if(Auth::user()->isHR() || Auth::user()->isCoordinator())--}}
                <li>
                    <a href="/total_leave_request">
                        <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                </li>
{{--            @endif--}}
        </ul>
    </li>

{{--    @if(Auth::user()->isHR())--}}


        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-money"></span>
                <span class="sidebar-title">Expenses</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/expense_add">
                        <span class="glyphicon glyphicon-book"></span> Add Expense </a>
                </li>
                <li>
                    <a href="/expense_list">
                        <span class="glyphicon glyphicon-modal-window"></span> Expense Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-arrow-circle-o-up"></span>
                <span class="sidebar-title">Promotions</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/promote_add">
                        <span class="glyphicon glyphicon-book"></span> Promote </a>
                </li>
                <li>
                    <a href="/promote_list">
                        <span class="glyphicon glyphicon-modal-window"></span> Promotion Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa fa-trophy"></span>
                <span class="sidebar-title">Awards</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/add-award">
                        <span class="fa fa-adn"></span> Add Award </a>
                </li>
                <li>
                    <a href="/award-listing">
                        <span class="glyphicon glyphicon-calendar"></span> Award Listings </a>
                </li>
                <li>
                    <a href="/assign-award">
                        <span class="fa fa-desktop"></span> Awardees </a>
                </li>
                <li>
                    <a href="/awardees-listing">
                        <span class="fa fa-clipboard"></span> Awardees Listings </a>
                </li>
            </ul>
        </li>
{{--    @endif--}}


    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa fa-gavel"></span>
            <span class="sidebar-title">Trainings</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
{{--            @if(\Auth::user()->notAnalyst())--}}
                <li>
                    <a href="/add-training-program">
                        <span class="fa fa-adn"></span> Add Training Program </a>
                </li>
{{--            @endif--}}
            <li>
                <a href="/show-training-program">
                    <span class="glyphicon glyphicon-calendar"></span> Program Listings </a>
            </li>
{{--            @if(\Auth::user()->notAnalyst())--}}
                <li>
                    <a href="/add-training-invite">
                        <span class="fa fa-desktop"></span> Training Invite </a>
                </li>
{{--            @endif--}}
            <li>
                <a href="/show-training-invite">
                    <span class="fa fa-clipboard"></span> Invitation Listings </a>
            </li>
        </ul>
    </li>

    <p> &nbsp; </p>
</ul>
<!-- -------------- /Sidebar Menu  -------------- -->
