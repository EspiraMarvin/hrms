<div class="animated fadeIn">
    <div class="sidebar-widget author-widget">
            <a  href="/profile">
                @if(isset(Auth::user()->employee->photo))
                    <img src="/storage/photos/{{Auth::user()->employee->photo}}" width="50%" height="30px"
                         style="margin-left: 12px" class="img-responsive">
                @endif
            </a>
            <div class="media-body">
                <div class="media-author">
                    <a style="text-decoration: none" href="/profile">{{Auth::user()->name}}</a>
                </div>
            </div>
    </div>
    <!-- -------------- Sidebar Menu  -------------- -->
    <ul class="nav sidebar-menu scrollable">
        <li class="active">
            <a  href="/dashboard">
{{--            <a  href="{{route('dashboard')}}">--}}
                <span class="fa fa-dashboard"></span>
                <span class="sidebar-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->isAdmin())
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-group"></span>
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
                <li>
                    <a href="/supervisor_list">
                        <span class="glyphicon glyphicon-tags"></span> Supervisor Listing </a>
                </li>
                <li>
                    <a href="/contracts_list">
                        <span class="glyphicon glyphicon-tags"></span> Contracts Listing </a>
                </li>
                <li>
                    <a href="/contracts_renewal">
                        <span class="glyphicon glyphicon-tags"></span> Contracts Renewal Listing </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-th-list"></span>
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
                <span class="fa fa-money"></span>
                <span class="sidebar-title">Bank Account</span>

            </a>
        </li>

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-cubes"></span>
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

        @endif
        @if(Auth::user()->isAdmin())

            <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa-gavel"></span>
                    <span class="sidebar-title">Targets</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="/my_target_list">
                            <span class="glyphicon glyphicon-modal-window"></span> My Target List </a>
                    </li>

                    @if(Auth::user()->isSupervisor())
                        <li>
                            <a href="/target_assign">
                                <span class="glyphicon glyphicon-book"></span> Assign Target </a>
                        </li>
                        <li>
                            <a href="/target_assign_list">
                                <span class="glyphicon glyphicon-calendar"></span> Supervisees Target List</a>
                        </li>
                    @endif
                        <li>
                            <a href="/total_targets_list">
                                <span class="glyphicon glyphicon-calendar"></span> Total Targets List</a>
                        </li>
                </ul>

            </li>
        @endif

        @if(!Auth::user()->isAdmin() && Auth::user()->isSupervisor())

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-gavel"></span>
                <span class="sidebar-title">Targets</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/my_target_list">
                        <span class="glyphicon glyphicon-modal-window"></span> My Target List </a>
                </li>
                    <li>
                        <a href="/target_assign">
                            <span class="glyphicon glyphicon-book"></span> Assign Target </a>
                    </li>
                    <li>
                        <a href="/target_assign_list">
                            <span class="glyphicon glyphicon-calendar"></span> Supervisees Target List</a>
                    </li>
            </ul>

        </li>
        @endif

        @if(!Auth::user()->isAdmin() && !Auth::user()->isSupervisor())

            <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa-gavel"></span>
                    <span class="sidebar-title">Targets</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="/my_target_list">
                            <span class="glyphicon glyphicon-modal-window"></span> My Target List </a>
                    </li>
                </ul>

            </li>
        @endif


        @if(Auth::user()->isAdmin())
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
                    <a href="/my_assigned_assets">
                        <span class="fa fa-desktop"></span> My Assigned Assets </a>
                </li>
                <li>
                    <a href="/asset_assign_list/{id}">
                        <span class="fa fa-clipboard"></span> Asset Assignment Listings </a>
                </li>
            </ul>
        </li>
        @endif

        @if(!Auth::user()->isAdmin())
            <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa fa-laptop"></span>
                    <span class="sidebar-title">Assets</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="/my_assigned_assets">
                            <span class="fa fa-desktop"></span> My Assigned Assets </a>
                    </li>
                </ul>
            </li>

        @endif

        @if(Auth::user()->isAdmin())

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
                @if(Auth::user()->isSupervisor() && \Auth::user()->leaveApprove())<li>
                        <a href="/approve_leave">
                            <span class="glyphicon glyphicon-calendar"></span> Approve Leave </a>
                    </li>
                @endif
                <li>
                    <a href="/my_leave_list">
                        <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
                </li>

                <li>
                    <a href="/leave_type_add">
                        <span class="fa fa-desktop"></span> Add Leave Type </a>
                </li>
                <li>
                    <a href="/leave_type_list">
                        <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                </li>
                <li>
                    <a href="/total_leave_list">
                        <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                </li>
            </ul>
        </li>
        @endif

        @if(!Auth::user()->isAdmin())
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
                    @if(Auth::user()->isSupervisor() && \Auth::user()->leaveApprove())

                        <li>
                            <a href="/approve_leave">
                                <span class="glyphicon glyphicon-calendar"></span> Approve Leave </a>
                        </li>
                    @endif
                    <li>
                        <a href="/my_leave_list">
                            <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
                    </li>
                    <li>
                        <a href="/leave_type_list">
                            <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                    </li>
                </ul>
            </li>
        @endif

        @if(Auth::user()->isAdmin())
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
        @endif

        @if(Auth::user()->isAdmin())
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
        @endif

        @if(!Auth::user()->isAdmin())
            <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa-arrow-circle-o-up"></span>
                    <span class="sidebar-title">Promotions</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="/promote_list">
                            <span class="glyphicon glyphicon-modal-window"></span> Promotion Listings </a>
                    </li>
                </ul>
            </li>
        @endif

        @if(Auth::user()->isAdmin())
            <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa fa-trophy"></span>
                <span class="sidebar-title">Awards</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/award_add">
                        <span class="fa fa-adn"></span> Add Award </a>
                </li>
                <li>
                    <a href="/award_list">
                        <span class="glyphicon glyphicon-calendar"></span> Awards List </a>
                </li>
                <li>
                    <a href="/award_assign">
                        <span class="fa fa-desktop"></span> Assign Award </a>
                </li>
                <li>
                    <a href="/awardees_listing">
                        <span class="fa fa-clipboard"></span> Awardees Listings </a>
                </li>
                <li>
                    <a href="/my_awards">
                        <span class="fa fa-clipboard"></span> My Awards </a>
                </li>
            </ul>
        </li>
        @endif

        @if(!Auth::user()->isAdmin())
            <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa fa-trophy"></span>
                    <span class="sidebar-title">Awards</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="/award_list">
                            <span class="glyphicon glyphicon-calendar"></span> Awards List </a>
                    </li>
                    <li>
                        <a href="/awardees_listing">
                            <span class="fa fa-clipboard"></span> Awardees Listings </a>
                    </li>
                    <li>
                        <a href="/my_awards">
                            <span class="fa fa-clipboard"></span> My Awards </a>
                    </li>
                </ul>
            </li>
        @endif
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-graduation-cap"></span>
                <span class="sidebar-title">Trainings</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                {{--            @if(\Auth::user()->notAnalyst())--}}
                <li>
                    <a href="/train_add">
                        <span class="fa fa-adn"></span> Add Training Program </a>
                </li>
                {{--            @endif--}}
                <li>
                    <a href="/train_list">
                        <span class="glyphicon glyphicon-calendar"></span> Program Listings </a>
                </li>
                {{--            @if(\Auth::user()->notAnalyst())--}}
                <li>
                    <a href="/train_invite">
                        <span class="fa fa-desktop"></span> Training Invite </a>
                </li>

                <li>
                    <a href="/my_train_invite">
                        <span eclass="fa fa-desktop"></span>My Training Invites </a>
                </li>

                {{--            @endif--}}
                <li>
                    <a href="/train_invite_list">
                        <span class="fa fa-clipboard"></span>Training Invitation Listings </a>
                </li>
            </ul>
        </li>

    </ul>
</div>
<!-- -------------- /Sidebar Menu  -------------- -->
