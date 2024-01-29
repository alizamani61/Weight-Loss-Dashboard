<div class="row">
    <div class="col-md-12">
        <div class="">
            <div class="x_content">
                <div class="row">
                    <input type="hidden" id="userToken" value="<?=$user->data->userToken?>"/>
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
                        <?php $activeSubscription = $user->subscriptions->activeSubscription ?>
                        <?php if ($activeSubscription): ?>
                            <div class="tile-stats">
                                <div class="icon">
                                    <i class="fa fa-credit-card text-success"></i>
                                </div>
                                <div class="count text-success">
                                    <span class="pull-left"><?= $activeSubscription->amount ?></span>
                                    <form action="" method="post" class="pull-left ajaxForm" data-target="#dashboard_root">
                                        <input type="hidden" name="cancel_subscription" value="1" />
                                        <input type="hidden" name="phone_number" value="<?= $phoneNumber ?>" />
                                        <input type="hidden" name="subscriptionToken" value="<?= $activeSubscription->subscriptionToken ?>" />
                                        <button type="submit" class="btn btn-danger btn-sm offset-2"><i>Cancel</i></button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                                <h3 class="text-success">Source: <?= $activeSubscription->nextBillingDate ?></h3>
                                <p class="text-success">
                                    has subscription | Next Bill Date: <?= $activeSubscription->nextBillingDate ?>
                                </p>
                            </div>
                            <?php ELSE: ?>
                            <div class="tile-stats">
                                <div class="icon">
                                    <i class="fa fa-credit-card text-danger"></i>
                                </div>
                                <div class="count text-danger">0</div>

                                <h3 class="text-danger">No Subscription</h3>
                                <p class="text-danger">the user has no subscription</p>
                            </div>
                        <?php ENDIF ?>
                    </div>
                    
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                            </div>
                            <div class="count"><?= $user->data->targetWeight ?></div>

                            <h3>Target Weight</h3>
                            <p>Target Weight</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-calendar-o"></i>
                            </div>
                            <div class="count"><?= $user->data->signUpTime ?></div>

                            <h3>Sign Up Time</h3>
                            <p>Last Sign Up Time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!--Start Notes-->
    <div class="col-md-4 col-sm-12">
        <div class="x_panel full_height">
            <div class="x_title">
                <h2>Notes<small>Consultants</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content fixed_height_290 overflow_scroll-y">
                <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                        <?php //var_dump($user->data->notes);?>
                        
                        <?php foreach ($user->data->notes as $row): ?>
                            <?php 
                                $priority = (($row["type"] == 3) ? "extreme" : (($row["type"] == 2) ? "high" : (($row["type"] == 1) ? "medium" : "low" ) ) ) 
                            ?>
                            <li>
                                <div class="block <?= $priority ?>">
                                    <div class="block_content">
                                        <h2 class="title <?= $priority ?>">
                                            <a href="#"><?= $row["data"] ?></a>
                                        </h2>
                                        &nbsp;<span class="badge badge-primary <?= $priority ?>"><?= $priority ?> priority</span>
                                        <div class="byline">
                                            <span><?= $row["data"] ?></span> by <a><?= $row["registrarCoach"] ?></a>
                                        </div>
                                        <p class="excerpt"><?= $row["data"] ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Notes-->
    <div class="col-md-8 col-sm-12"> 
        <div class="x_panel">
            <div class="x_title">
                <h2>Weights chart <small>Weekly progress</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 ">
                    <div class="demo-container">
                        <div data-inf="<?= $weights ?>" id="weight_chart" class="demo-placeholder"></div>
                    </div>

                    <div class="tiles">
                        <?php if (!$user->data->physics->isEmpty): ?>
                            <div class="col-md-3 col-3 tile">
                                <span>Height</span>
                                <h2><?= $user->data->physics->height ?></h2>
                            </div>
                            <div class="col-md-3 col-3 tile">
                                <span>Weight</span>
                                <h2><?= $user->data->physics->weight ?></h2>
                            </div>
                            <div class="col-md-3 col-3 tile">
                                <span>Age</span>
                                <h2><?= $user->data->physics->age ?></h2>
                            </div>
                            <div class="col-md-3 col-3 tile">
                                <span>Gender </span><br/>
                                <?php if ($user->data->physics->isMale): ?>
                                    <span class="badge badge-pill badge-primary">Male</span>
                                    <?php ELSE: ?> 
                                    <span class="badge badge-pill badge-danger">Female</span>
                                <?php ENDIF; ?>
                            </div>

                            <?php ELSE: ?>
                            <div class="alert alert-warning alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Alarm!</strong> <?= _PHYSICAL_CHAR_NOT_EXISTS ?>
                            </div>
                        <?php ENDIF; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<br />

<div class="row"> 
    <div class="col-md-8 col-sm-8">
        <div class="x_panel tile fixed_height_320">
            <div class="x_title"> 
                <h2>Payments</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="full_width">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Billing Date</th>
                                <th>Duration</th>
                                <th>Source</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user->data->payments as $key => $row): ?>
                                <tr>
                                    <td>
                                        <?php if ($row["isCanceled"]): ?>
                                            <span class="badge badge-danger">Canceled</span>&nbsp;
                                        <?php endif; ?> 
                                        <?php if ($row["isRefunded"]): ?>
                                            <span class="badge badge-warning">Refunded</span>&nbsp;
                                        <?php endif; ?>     
                                        <?= $row["amount"] ?> 
                                    </td>
                                    <td><?= $row["billingDate"] ?></td>
                                    <td><?= $row["duration"] ?></td>
                                    <td><?= $row["source"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Device Usage-->
    <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
                <h2>Device Usage</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content fixed_height_250 overflow_scroll-y">
                <table class="full_width">

                    <tr>
                        <th>OS</th>
                        <th>model</th>
                        <th>addedTime</th>
                    </tr>

                    <?php foreach ($user->data->devices as $key => $row): ?>
                        <tr>
                            <td>
                                <i class="fa fa-square blue"></i>&nbsp;<?= $row->os ?> 
                            </td>
                            <td><?= $row->model ?></td>
                            <td><?= $row->addedTime ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
    <!--Device Usage-->

</div>
