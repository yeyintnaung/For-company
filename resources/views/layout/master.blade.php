<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- BOOTSTRAP STYLES-->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
       <!-- FONTAWESOME STYLES-->
      <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
       <!-- MORRIS CHART STYLES-->

          <!-- CUSTOM STYLES-->
      <link href="{{asset('css/custom.admin.css')}}" rel="stylesheet" />
       <!-- GOOGLE FONTS-->
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
       <!-- TABLE STYLES-->
      <link href="{{asset('js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
      <link href="{{asset('fontawesome/css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css"/>

    <!--FONTAWESOME-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/froala_editor.css')}}">
    <link rel="stylesheet" href="{{asset('css/froala_style.css')}}">
    <link rel="stylesheet" href=".{{asset('css/plugins/colors.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/emoticons.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/image_manager.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/image.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/line_breaker.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/table.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/char_counter.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/video.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/fullscreen.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/file.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/css/jquery.atwho.min.css">

    <!-- Code Mirror CSS file. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <!-- Include the plugin CSS file. -->
    <link rel="stylesheet" href="{{asset('css/plugins/code_view.css')}}">

    <!-- Dashboard Animate -->
    <style media="screen">
    #shiva
{
width: 100px;
height: 100px;
background: red;
-moz-border-radius: 50px;
-webkit-border-radius: 50px;
border-radius: 50px;
float:left;
margin:5px;
}
.count
{
line-height: 100px;
color:white;
margin-left:30px;
font-size:25px;
}
#talkbubble {
 width: 120px;
 height: 80px;
 background: red;
 position: relative;
 -moz-border-radius:    10px;
 -webkit-border-radius: 10px;
 border-radius:         10px;
float:left;
margin:20px;
}
#talkbubble:before {
 content:"";
 position: absolute;
 right: 100%;
 top: 26px;
 width: 0;
 height: 0;
 border-top: 13px solid transparent;
 border-right: 26px solid red;
 border-bottom: 13px solid transparent;
}

.linker
{
font-size : 20px;
font-color: black;
}

    </style>
    <style media="screen">
    .box > .icon { text-align: center; position: relative; }
.box > .icon > .image { position: relative; z-index: 2; margin: auto; width: 88px; height: 88px; border: 8px solid white; line-height: 88px; border-radius: 50%; background: #4466e4; vertical-align: middle; }
.box > .icon:hover > .image { background: #333; }
.box > .icon > .image > i { font-size: 36px !important; color: #fff !important; }
.box > .icon:hover > .image > i { color: white !important; }
.box > .icon > .info { margin-top: -24px; background: rgba(0, 0, 0, 0.04); border: 1px solid #e0e0e0; padding: 15px 0 10px 0; }
.box > .icon:hover > .info { background: rgba(0, 0, 0, 0.04); border-color: #e0e0e0; color: white; }
.box > .icon > .info > h3.title { font-family: "Roboto",sans-serif !important; font-size: 16px; color: #222; font-weight: 500; }
.box > .icon > .info > p { font-family: "Roboto",sans-serif !important; font-size: 13px; color: #666; line-height: 1.5em; margin: 20px;}
.box > .icon:hover > .info > h3.title, .box > .icon:hover > .info > p, .box > .icon:hover > .info > .more > a { color: #222; }
.box > .icon > .info > .more a { font-family: "Roboto",sans-serif !important; font-size: 12px; color: #222; line-height: 12px; text-transform: uppercase; text-decoration: none; }
.box > .icon:hover > .info > .more > a { color: #fff; padding: 6px 8px; background-color: #4466e4; }
.box .space { height: 30px; }
    </style>
</head>
<body>
    <div id="wrapper">

          @include('layout.sidebar')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                      @yield('content')

                    </div>
                </div>


                </div>

            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('js/jquery-1.10.2.js')}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables/dataTables.bootstrap.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Dashboard Annimate -->
    
    <script type="text/javascript">
      @yield('myscript')
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/at.js/1.4.0/js/jquery.atwho.min.js"></script>

    <script type="text/javascript" src="{{asset('js/froala_editor.min.js')}}" ></script>

    <script type="text/javascript" src="{{asset('js/plugins/align.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/code_beautifier.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/code_view.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/font_size.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/font_family.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/image.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/image_manager.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/link.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/lists.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/paragraph_format.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/url.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/entities.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/save.min.js')}}"></script>

    <script>
        $(function(){
            $('#edit').froalaEditor({
                toolbarButtons: ['bold', 'italic', 'underline', 'fontSize', 'fontFamily', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|', 'insertLink', 'insertImage', 'undo', 'redo', 'html']
            })
        });
    </script>
</body>
</html>
