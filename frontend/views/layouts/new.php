<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Карта проекта</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="project_Name_script">
            </div>
        </div>
        <!-- /.navbar-header -->

    </nav>
    <!-- /.navbar-static-top -->

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav nav-tabs nav-stacked" id="side-menu">

                <li class="active">
                    <a a href="#home" data-toggle="tab"><i class="fa fa-clock-o fa-fw"></i> Хронология</a>
                </li>
                <li>
                    <a href="#files" data-toggle="tab"><i class="fa fa-paperclip fa-fw"></i> Файлы</a>
                </li>
                <li>
                    <a href="#client" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Заказчик</a>
                </li>
                <li>
                    <a href="#team" data-toggle="tab"><i class="fa fa-users fa-fw"></i> Команда</a>
                </li>
                <li>
                    <a href="#project_info" data-toggle="tab"><i class="fa fa-list-alt fa-fw"></i> Данные по проекту</a>
                </li>
                <li>
                    <a href="#messages" data-toggle="tab"><i class="fa fa-comments-o fa-fw"></i> Переписка</a>
                </li>
            </ul>
            <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
    </nav>
    <!-- /.navbar-static-side -->

    <div id="page-wrapper">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-clock-o fa-fw"></i> Хронология</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row" id="timeline_header">
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <ul class="timeline" id="timeline_script">
                            </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row" id="timeline_footer">
                </div>

            </div>
            <div class="tab-pane" id="files">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-paperclip fa-fw"></i> Файлы</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-download fa-fw"></i> Файлы для скачивания</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Дата и время</th>
                                    <th>Описание</th>
                                    <th>Путь к файлу в Copy</th>
                                </tr>
                                </thead>
                                <tbody id="filesD_script">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                        <hr>
                        <h4><i class="fa fa-globe fa-fw"></i> Файлы онлайн</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Дата и время</th>
                                    <th>Описание</th>
                                </tr>
                                </thead>
                                <tbody id="filesO_script">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="client">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Заказчик</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="client_info_script">
                        </div>
                        <p><hr></p>
                        <div id="contacts_script">
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="team">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Команда</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                </tr>
                                </thead>
                                <tbody id="team_script">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="project_info">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-list-alt fa-fw"></i> Данные по проекту</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive" id="project_info_script">
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="messages">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-comments-o fa-fw"></i> Переписка</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12" id="messages_script">
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

    <footer>
        <div class="container">
            <p> © Webparadox 2014 </p>
        </div>
    </footer>
    <!-- /#footer -->

</div>
<!-- /#wrapper -->


<script id="ProjectNameTemplate" type="text/template">
    <a class="navbar-brand" href="index.html" >
        Карта проекта: <%= name%>
    </a>
</script>

<script id="TimelineHeaderTemplate" type="text/template">
    <div class="panel panel-<%= color%>">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title"><i class="fa fa-<%= type%> fa-fw"></i> <%= title%></h4>
                    <p>
                        <small class="text-muted"><i class="fa fa-clock-o fa-fw"></i> <%= time%></small>
                    </p>
                </div>
                <div class="timeline-body">
                    <p><%= text%></p>
                </div>
            </div>
        </div>
    </div>
</script>

<script id="TimelineFooterTemplate" type="text/template">
    <div class="panel panel-<%= color%>">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title"><i class="fa fa-<%= type%> fa-fw"></i> <%= title%></h4>
                    <p>
                        <small class="text-muted"><i class="fa fa-clock-o fa-fw"></i> <%= time%></small>
                    </p>
                </div>
                <div class="timeline-body">
                    <p><%= text%></p>
                </div>
            </div>
        </div>
    </div>
</script>

<script id="TimelineTemplate" type="text/template">
    <div class="timeline-badge <%= color%>"><i class="fa fa-<%= type%> fa-fw"></i>
    </div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title"> <%= title%></h4>
            <p>
                <small class="text-muted"><i class="fa fa-clock-o fa-fw"></i> <%= time%></small>
            </p>
        </div>
        <div class="timeline-body">
            <p><%= text%></p>
        </div>
    </div>
</script>

<script id="ProjectInfoTemplate" type="text/template">
    <thead>
    <tr>
        <th> </th>
        <th>Наименование</th>
        <th>Значение</th>
    </tr>
    </thead>
    <tbody >
    <tr>
        <td><i class="fa fa-tag fa-fw"></i> </td>
        <td>Название проекта</td>
        <td><%= name%></td>
    </tr>
    <tr>
        <td><i class="fa fa-calendar fa-fw"></i> </td>
        <td>Дата начала</td>
        <td><%= start%></td>
    </tr>
    <tr>
        <td><i class="fa fa-calendar fa-fw"></i> </td>
        <td>Дата окончания</td>
        <td><%= end%></td>
    </tr>
    <tr>
        <td><i class="fa fa-clock-o fa-fw"></i> </td>
        <td>Часов, рабочих</td>
        <td><%= hours%></td>
    </tr>
    <tr>
        <td><i class="fa fa-ruble fa-fw"></i> </td>
        <td>Бюджет</td>
        <td><%= money%></td>
    </tr>
    <tr>
        <td><i class="fa fa-tasks fa-fw"></i> </td>
        <td>Таск-менеджер</td>
        <td><a href="<%= tasks%>" target="_blank"><%= tasks%></a></td>
    </tr>
    <tr>
        <td><i class="fa fa-code-fork fa-fw"></i> </td>
        <td>Система контроля версий</td>
        <td><a href="<%= git%>" target="_blank"><%= git%></a></td>
    </tr>
    <tr>

        <td><i class="fa fa-mobile fa-fw"></i> </td>
        <td>TestFlightApp</td>
        <td><a href="<%= testflight%>" target="_blank"><%= testflight%></a></td>
    </tr>
    </tbody>
</script>

<script id="TeamTemplate" type="text/template">
    <td><%= id%></td>
    <td><%= fio%></td>
    <td><%= role%></td>
</script>

<script id="FilesDTemplate" type="text/template">
    <td><%= id%></td>
    <td><a href="<%= link%>" target="_blank"><%= file_name%></a></td>
    <td><%= time%></td>
    <td><%= description%></td>
    <td><%= path%></td>
</script>

<script id="FilesOTemplate" type="text/template">
    <td><%= id%></td>
    <td><a href="<%= link%>" target="_blank"><%= file_name%></a></td>
    <td><%= time%></td>
    <td><%= description%></td>
</script>

<script id="MessagesTemplate" type="text/template">
    <% if (type == "skype"){ %>
    <div class="panel-heading">
        <%= time%> / <i class="fa fa-skype fa-fw"></i> Skype
    </div>
    <div class="panel-body">
        <p><strong>  <%= to.join(", ") %> </strong></p>
        <% } else {%>
        <div class="panel-heading">
            <%= time%> / <i class="fa fa-envelope fa-fw"></i> Email
        </div>
        <div class="panel-body">
            <p>от: <strong> <%= from%> </strong></p>
            <p>кому: <strong>  <%= to.join(", ") %> </strong></p>
            <p> тема: <strong> <%= header%> </strong></p>
            <% } %>
            <hr>
            <p><%= text%></p>
        </div>
        <div class="panel-footer">
            Файлы:
            <% _(files).each(function(file) { %>
            <a href="<%= file.link %>" target="_blank"><%=file.file_name %></a>,
            <% }); %>
        </div>
</script>

<script id="ClientInfoTemplate" type="text/template">
    <h2> <small>Название: </small> <%= organization%> </h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseRec" class="">Реквизиты компании</a>
            </h4>
        </div>
        <div id="collapseRec" class="panel-collapse collapse" style="height: auto;">
            <div class="panel-body"><%= details%></div>
        </div>
    </div>
</script>

<script id="ContactsTemplate" type="text/template">
    <h2><small>Контактное лицо: </small> <%= contact_name%> </h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
            <tr><td><i class="fa fa-envelope fa-fw"></i> Email:</td><td><%= email%></td></tr>
            <tr><td><i class="fa fa-skype fa-fw"></i> Skype</td><td><%= skype%></td></tr>
            <tr><td><i class="fa fa-phone fa-fw"></i> Телефон:</td><td><%= phone%></td></tr>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
    <hr>
</script>



<!-- Core Scripts - Include with every page -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- For Json -->
<script src="js/json2.js"></script>
<script src="js/underscore-min.js"></script>
<script src="js/backbone-min.js"></script>
<script src="js/index.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

</body>

</html>
