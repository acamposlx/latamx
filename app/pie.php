<script type="text/javascript">
                //<![CDATA[
                function makeArray()
                {
                    for (i = 0; i<makeArray.arguments.length; i++)
                    this[i + 1] = makeArray.arguments[i];
                }
                var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var yy = date.getYear();
                var year = (yy < 1000) ? yy + 1900 : yy;
                //document.write(day + " de " + months[month] + " del " + year);
                //]]>
                </script>
                <script type="text/javascript">
                function startTime()
                {
                    today=new Date();
                    var day = today.getDate();
                    var yy = today.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    h=today.getHours();
                    m=today.getMinutes();
                    s=today.getSeconds();
                    m=checkTime(m);
                    s=checkTime(s);
                    document.getElementById('reloj').innerHTML=day+" de "+ months[month] + " del " + year  + " " + h+":"+m+":"+s;
                    t=setTimeout('startTime()',500);
                }
                function checkTime(i)
                {
                    if (i<10) {i="0" + i;}return i;
                }
                window.onload=function(){startTime();}
                </script>
<div class="footer" style="background-color: black; width:100%;">
    <footer>
        <table style="width:100%;">
            <tr>
                <td style="text-align: left"><img src="img/slogan.png" width="201" height="16" /></td>
                <td><div id="reloj" style="font-size:15px; color: #FFF;"></div></td>
                <td style="text-align: right"><img alt="" class="auto-style2" src="Images/logo-latamxpress-blanco.png" style="text-align: right" /></td>
            </tr>
        </table>
    </footer>
</div>




    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
</body>
</html>