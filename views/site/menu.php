<?php

/* @var $this yii\web\View */

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Ресторан</a></li>
        <li class="breadcrumb-item"><a href="tables.html">Стол</a></li>
        <li class="breadcrumb-item active" aria-current="page">Меню</li>
    </ol>
</nav>

<div class="row">
    <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-menu-list" data-toggle="list"
               href="#list-menu" role="tab" aria-controls="menu">Меню</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
               href="#list-history" role="tab" aria-controls="history">История</a>
        </div>
    </div>
    <div class="col-10">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-menu" role="tabpanel" aria-labelledby="list-menu-list">

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action"> <!-- active -->
                        <div class="media">
                            <img src="images/2.jpg" alt="Кофе" width="100" height="100" style="margin-right: 16px;">
                            <div class="media-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5>Кофе <span class="badge badge-dark" style="font-size: 50%;">Категория</span>
                                    </h5>
                                    <strong>200 тг</strong>
                                </div>
                                <p class="mb-1">Описание кофе</p>
                            </div>
                        </div>
                    </a>
                </div>

                <a type="button" class="btn btn-primary" style="margin-top: 16px; color: aliceblue;">Сделать заказ</a>

            </div>
            <div class="tab-pane fade" id="list-history" role="tabpanel" aria-labelledby="list-history-list">
                <div class="card bg-light mb-3">
                    <div class="card-header">Сумма: 100 000 тг</div>
                    <div class="card-body">

                        <div class="list-group">
                            <li class="list-group-item"> <!-- active -->
                                <div class="media">
                                    <img src="images/2.jpg" alt="Кофе" width="100" height="100"
                                         style="margin-right: 16px;">
                                    <div class="media-body">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5>Кофе <span class="badge badge-dark"
                                                           style="font-size: 50%;">Категория</span></h5>
                                            <strong>200 тг</strong>
                                        </div>
                                        <p class="mb-1">Описание кофе</p>
                                    </div>
                                </div>
                            </li>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>