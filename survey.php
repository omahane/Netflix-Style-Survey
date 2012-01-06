<?php 
require_once('./includes/connection.inc.php');
// Netflix-style Sruvey
if (isset($_GET['response'])&& !$_POST){
	
	// initialize flag
	$OK = false;
	// create database connection
	$conn = dbConnect('write', 'pdo');
	// create SQL
	$sql = 'INSERT INTO survey (id, response)
		  VALUES(:id, :response)';
	$stmt = $conn->prepare($sql);
	// bind the parameters and execute the statement
	$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
	$stmt->bindParam(':response', $_GET['response'], PDO::PARAM_STR);
	// execute and get number of affected rows
	$stmt->execute();
	$OK = $stmt->rowCount();
	
  
}
// initialize flags
$OK = false;
$done = false;
// create database connection
$conn = dbConnect('write', 'pdo');
// get details of selected record
if (isset($_GET['id']) && !$_POST) {
  // prepare SQL query
  $sql = 'SELECT id, response, q1, q2, q3 FROM survey
		  WHERE id = ?';
  $stmt = $conn->prepare($sql);
  // bind the results
  $stmt->bindColumn(1, $id);
  $stmt->bindColumn(2, $response);
  $stmt->bindColumn(3, $q1);
  $stmt->bindColumn(4, $q2);
  $stmt->bindColumn(5, $q3);
  // execute query by passing array of variables
  $OK = $stmt->execute(array($_GET['id']));
  $stmt->fetch();
}
// if form has been submitted, update record
if (isset($_POST['update'])) {
  // prepare update query
  $sql = 'UPDATE survey SET q1 = ?, q2 = ?, q3 = ?
		  WHERE id = ?';
  $stmt = $conn->prepare($sql);
  // execute query by passing array of variables
  $stmt->execute(array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['id']));
  $done = $stmt->rowCount();
}
// redirect if completed
if ($done) {
  header('Location: http://penguin.creighton.edu/~iki18143/survey.php');
  exit;
}
// display error message if query fails
if (isset($stmt) && !$OK && !$done) {
  $error = $stmt->errorInfo();
  if (isset($error[2])) {
	$error = $error[2];
  }
}
?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Survey</title>

<link rel="shortcut icon" href="http://www.creighton.edu/fileadmin/images/icons/favicon.ico">
<link rel="icon" href="http://www.creighton.edu/fileadmin/images/icons/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Creighton University Admissions">
<meta name="keywords" content="Admissions">
<meta name="author" content="Creighton Admissions Isamu Kishi">
<link rel="stylesheet" type="text/css" href="http://www.creighton.edu/typo3temp/stylesheet_5badb68f2a.css?1319830359" media="all">
<link rel="stylesheet" type="text/css" href="http://www.creighton.edu/fileadmin/user/Admissions/stylesheets/common.css?1321995252" media="all">

</head>

<body class="subpages apply" id="manual">

<a id="totop"></a>

<div class="outercontainer">



  <!-- the metarow should remain at the top of the page - it will get covered by the popup nav as people move to other sections.  This and the section-navigation-popup are the only things you cannot move -->

 <div class="admissionscontainer">

  <div class="toprow">

  <div class="innercontainer grid24of24">

      <ul class="horizontalmenu metamenu grid13of24">

        <li><a href="http://www.creighton.edu/about/index.php"  >About</a></li><li><a href="http://www.creighton.edu/academics/index.php"  >Academics</a></li><li><a href="http://www.creighton.edu/alumni/index.php"  >Alumni</a></li><li><a href="http://www.creighton.edu/futurestudents/index.php"  >Future Students</a></li><li><a href="http://www.creighton.edu/ministry/index.php"  >Ministry</a></li><li><a href="http://www.creighton.edu/students/index.php"  >Students</a></li>

        <li><a href="http://www.creighton.edu//search/">Search Creighton</a></li>

      </ul>

      <div id="very_top_navigate">
	<!--  CONTENT ELEMENT, uid:143672/html [begin] -->
		<a id="c143672" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<!-- menu begin -->



<div id="navigate">

  <ul class="primary">

  <li class="tab1"><a href="http://www.creighton.edu/admissions/apply/">Apply</a></li>

  <li class="tab2"><a href="http://www.creighton.edu/admissions/visit/scheduleavisit/">Schedule A Visit</a></li>

    <li class="tab3"><a href="http://www.creighton.edu/admissions/requestinfo/">Request Info</a>    </li>

    <li class="tab4"><a href="http://www.creighton.edu/admissions/search/">Search</a>



  <div class="sub search">

        <div class="col">

          <h3>Search:</h3>

          

        </div>

      </div>





</li>

  </ul>

</div>

<!-- menu end -->


		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:143672/html [end] -->
		</div>

    </div>

  </div>

  <div class="main" role="main">

    <div class="innercontainer grid24of24">

    <div class="logorow">

    	<div class="culogo grid6of24">

			<a class="hiddentextlink" href="/"><span class="hiddenIR">Creighton University</span></a>

		</div>

      	<div class="admissionsnav horizontalmenu grid18of24">

       		 <ul class="site-navigation"><li class="sitelist"><a href="http://www.creighton.edu/admissions/about/index.php" class="adm_main_nav_button nav_55296">About</a></li><li class="sitelist"><a href="http://www.creighton.edu/admissions/academics/index.php" class="adm_main_nav_button nav_55291">Academics</a></li><li class="sitelist"><a href="http://www.creighton.edu/admissions/studentlife/index.php" class="adm_main_nav_button nav_55294">Student Life</a></li><li class="sitelist"><a href="http://www.creighton.edu/admissions/visit/index.php" class="adm_main_nav_button nav_55292">Visit</a></li><li class="sitelist-cur"><a href="http://www.creighton.edu/admissions/apply/index.php" class="adm_main_nav_button nav_55290">Apply</a></li><li class="sitelist"><a href="http://www.creighton.edu/admissions/financialinfo/index.php" class="adm_main_nav_button nav_55293">Financial Info</a></li></ul>

     	 </div>

 

     	 </div>

	<div class="crumbs">

	 <a href="http://www.creighton.edu/admissions/index.php"  >Admissions</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;Apply  

	</div>

      	<div class="localnav">

        <!--###NAV_LOCAL###--> <!--###NAV_LOCAL###-->

      	</div>

     	 <div class="clear"></div>

      

      <div class="rightsidecallout">

      

       

       <div class="subnav-outer">Apply to Creighton<div class="subpageNav"><ul><li><a href="http://www.creighton.edu/admissions/apply/yourapplication/index.php"  >Your Application</a></li><li><a href="http://www.creighton.edu/admissions/apply/requirements/index.php"  >Requirements</a></li><li><a href="http://www.creighton.edu/admissions/apply/scholarships/index.php"  >Scholarships</a></li><li><a href="http://www.creighton.edu/admissions/apply/timelinesanddeadlines/index.php"  >Timelines and Deadlines</a></li><li><a href="http://www.creighton.edu/admissions/apply/applicationtips/index.php"  >Application Tips</a></li><li><a href="http://www.creighton.edu/admissions/apply/forms/index.php"  >Forms</a></li><li><a href="http://www.creighton.edu/admissions/apply/faqsaboutapplying/index.php"  >FAQs About Applying</a></li><li><a href="http://www.creighton.edu/admissions/campussafety/index.php"  >Campus Safety Report</a></li></ul></div></div>

       </div>

      <div class="mainouter"><div class="contentMain">
	<!--  CONTENT ELEMENT, uid:148229/html [begin] -->
		<a id="c148229" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<div style="width:720px">
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148229/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:144378/text [begin] -->
		<a id="c144378" class="csc-default" ></a>







<div class="csc-header csc-header-n2"><h1>Survey</h1></div>

<div>
    <?php if (isset($error)) {
  echo "<p>Error: $error</p>";
} ?>
	<?php
    if ($_GET['response']==yes){
		
		echo "<form id='form1' method='post' action=''>
		  <p>
			<label for='q1'>q1:</label>
			<input name='q1' type='text' class='widebox' id='q1' value='";
		
		echo htmlentities($q1, ENT_COMPAT);
		echo "'>
		  </p>
		  <p>
			<label for='q2'>q2:</label>
			<textarea name='q2' cols='60' rows='8' class='widebox' id='q2'>";
		echo htmlentities($q2, ENT_COMPAT);
		echo "</textarea>
		  </p>
		  		  <p>
			<label for='q3'>q3:</label>
			<textarea name='q3' cols='60' rows='8' class='widebox' id='q3'>";
		echo htmlentities($q3, ENT_COMPAT);
		echo "</textarea>
		  </p>
		  <p>
			<input type='submit' name='update' id='update'>
			<input name='id' type='hidden' value='";
		echo $_GET['id']; 
		echo "'>
		  </p>
		</form>";
			}

		
	else
		echo "Answer was no";
        ?>
</div>
    
    
    
			
	<!--  CONTENT ELEMENT, uid:144378/text [end] -->
		
	<!--  CONTENT ELEMENT, uid:144360/text [begin] -->
		<a id="c144360" class="csc-default" ></a>
		<!--  Text: [begin] -->
			<div class="clear"></div>
		<!--  Text: [end] -->
			
	<!--  CONTENT ELEMENT, uid:144360/text [end] -->
		
	<!--  CONTENT ELEMENT, uid:148230/html [begin] -->
		<a id="c148230" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			</div>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148230/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:148024/shortcut [begin] -->
		<a id="c148024" class="csc-default" ></a>
		<!--  Inclusion of other records (by reference): [begin] -->
			
	<!--  CONTENT ELEMENT, uid:147983/html [begin] -->
		<a id="c147983" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<!-- Google Code for Creighton University - Undergrad (general) Remarketing List -->

<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 1025823284;

var google_conversion_language = "en";

var google_conversion_format = "3";

var google_conversion_color = "666666";

var google_conversion_label = "YWkZCPzIoQIQtKST6QM";

var google_conversion_value = 0;

/* ]]> */

</script>

<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1025823284/?label=YWkZCPzIoQIQtKST6QM&amp;guid=ON&amp;script=0"/>

</div>

</noscript>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:147983/html [end] -->
		
		<!--  Inclusion of other records (by reference): [end] -->
			
	<!--  CONTENT ELEMENT, uid:148024/shortcut [end] -->
		</div></div>     

      

    	</div>

    	 <div class="clear"></div>

  </div>

  <footer class="footerrow grid24of24">

    <div class="admissions-footer applyfooter"><div class="footertop"></div><div class="innercontainer-footer">
	<!--  CONTENT ELEMENT, uid:144708/html [begin] -->
		<a id="c144708" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<div class="footertables">
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:144708/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:144813/html [begin] -->
		<a id="c144813" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<table>

  <tbody>

    <tr>

      <td class="navlist">NAVIGATION </td>

      <td class="foottwit-td"> FACEBOOK </td>

      <td class="foot-face"> CHAT LIVE </td>

    </tr>

    <tr>

      <td><table>

          <tbody>

            <tr class="footer-ul-toprow">

              <td class="footerabout"><span class="aboutlink" title="About Creighton"> Navigation</span>

                <ul class="footerlist">

                  <li><a href="http://www.creighton.edu/admissions/about/">About</a></li>

                  <li><a href="http://www.creighton.edu/admissions/academics/">Academics</a></li>

                  <li><a href="http://www.creighton.edu/admissions/studentlife/">Student Life</a></li>

                  <li><a href="http://www.creighton.edu/admissions/visit/">Visit</a></li>

                  <li><a href="http://www.creighton.edu/admissions/apply/">Apply</a></li>

                  <li><a href="http://www.creighton.edu/admissions/financialinfo/">Financial Info</a></li>

                </ul></td>

              <td class="footerapply"><span class="applylink" title="Apply"> Information for</span>

                <ul class="footerlist">

                <li><a href="http://www.creighton.edu/admissions/prospectivestudents/admitted/">Admitted Students</a></li>

                <li><a href="http://www.creighton.edu/admissions/prospectivestudents/transfer/">Transfer</a></li>



                  <li><a href="http://www.creighton.edu/admissions/prospectivestudents/senior/">Seniors</a></li>

                  <li><a href="http://www.creighton.edu/admissions/prospectivestudents/sophomore/">Sophomores</a></li>



                  <li><a href="http://www.creighton.edu/admissions/prospectivestudents/junior/">Juniors</a></li>

                  <li><a href="http://www.creighton.edu/admissions/parents/">Parents</a></li>

                  <li><a href="http://www.creighton.edu/admissions/highschoolcounselors">High School Counselors</a></li>

                  <li><a href="http://www.creighton.edu/admissions/volunteers">Volunteers</a></li>

                </ul></td>

              <td class="footervisit"><span class="visitlink">Prospective Students</span>

                <ul class="footerlist">

                  <li><a href="http://www.creighton.edu/admissions/">Undergraduate</a></li>

                  <li><a href="http://www.creighton.edu/admissions/prospectivestudents/internationalstudents/">International</a></li>

                  <li><a href="http://www.creighton.edu/gradschool/">Graduate</a></li>

                   <li><a href="http://www.creighton.edu/admissions/academics/professionalprograms">Professional</a></li>

                  <li><a href="http://www.creighton.edu/adultdegrees/">Adult</a></li>              

                </ul></td>

            </tr>

          </tbody>

        </table></td>

      <td> 

<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/creightonuniversity" width="210" height="275"  colorscheme="dark" show_faces="false" border_color="e7e7e7" stream="true" header="false" force_wall="true"></fb:like-box>

      </td>

      <td> 

     
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:144813/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:148223/shortcut [begin] -->
		<a id="c148223" class="csc-default" ></a>
		<!--  Inclusion of other records (by reference): [begin] -->
			
	<!--  CONTENT ELEMENT, uid:148222/html [begin] -->
		<a id="c148222" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<div id="blog_wrapper">
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148222/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:148221/list [begin] -->
		<a id="c148221" class="csc-default" ></a>
		<!--  Header: [begin] -->
			<div class="csc-header csc-header-n2"><h1>Admissions Blog</h1></div>
		<!--  Header: [end] -->
			
		<!--  Plugin inserted: [begin] -->
			<div id="business-blog">
<div class="blog-post"><h3 class="blog-title"><a target="_blank" href="http://blogs.creighton.edu/admissions/capture-the-moment-2011-12/2011/12/12/capture-the-moment-megan-from-omaha/">Capture the Moment: Megan from Omaha</a></h3>
<p class="blog-description">Moment captured: Megan from Omaha, Nebraska. Here's the story: While...</p></div>
<div class="blog-post"><h3 class="blog-title"><a target="_blank" href="http://blogs.creighton.edu/admissions/capture-the-moment-2011-12/2011/12/12/capture-the-moment-gabrielle-from-omaha/">Capture The Moment: Gabrielle from Omaha</a></h3>
<p class="blog-description">Moment captured: Gabrielle from Omaha, Nebraska. Here's the story:...</p></div>
<div class="blog-post"><h3 class="blog-title"><a target="_blank" href="http://blogs.creighton.edu/admissions/capture-the-moment-2011-12/2011/12/02/capture-the-moment-zachary-from-aviston/">Capture The Moment: Zachary from Aviston</a></h3>
<p class="blog-description">Moment captured: Zachary from Aviston, Illinois. Here's the story:...</p></div>
</div>

		<!--  Plugin inserted: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148221/list [end] -->
		
	<!--  CONTENT ELEMENT, uid:148220/html [begin] -->
		<a id="c148220" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			</div>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148220/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:148224/html [begin] -->
		<a id="c148224" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<div id="chat"></div>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148224/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:148225/html [begin] -->
		<a id="c148225" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<script type="text/javascript">

<!-- hide script

var timeNow=new Date();

//sets hourNow in terms of Central Timezone During CST

var hourNow=timeNow.getUTCHours() - 5;

var dayNow=timeNow.getDay();

var chatWidget = "<!-- Beginning of meebo me widget code. Want to talk with visitors on your page? Go to http://www.meebome.com/ and get your widget! --><p><object height='275' width='190'><param name='movie' value='http://widget.meebo.com/mm.swf?AZIQwkTzOW' /><embed height='275' width='190' src='http://widget.meebo.com/mm.swf?AZIQwkTzOW' type='application/x-shockwave-flash' wmode='transparent'></embed></object></p>"



function weekday() {

	if(dayNow != 0 && dayNow != 6)

	//if(dayNow > 6)

	return true;

	else

	return false;

	}



function officehours() {

	if (parseInt(hourNow) > 8 && parseInt(hourNow) < 17)

	return true;

	else

	return false;

	}



function hideBlog() {

 	document.getElementById("blog_wrapper").style.display = 'none';

	}



function placeBlog() {

 	document.getElementById("blog_wrapper").style.display = 'block';

	}



function placeChatWidget(){

	if (officehours()){

		if (weekday()){

		document.getElementById('chat').innerHTML = chatWidget;

		hideBlog();

		}

	}

	else placeBlog();

}

window.onload = placeChatWidget;

// end script hiding -->

</script>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:148225/html [end] -->
		
		<!--  Inclusion of other records (by reference): [end] -->
			
	<!--  CONTENT ELEMENT, uid:148223/shortcut [end] -->
		
	<!--  CONTENT ELEMENT, uid:144815/html [begin] -->
		<a id="c144815" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			

      </td>

    </tr>

  </tbody>

</table>


		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:144815/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:143632/html [begin] -->
		<a id="c143632" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<div class="clear"></div>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:143632/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:144709/html [begin] -->
		<a id="c144709" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			</div>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:144709/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:143630/html [begin] -->
		<a id="c143630" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<div class="lowerfooter"> 

<div class="footer-jc">A Catholic, Jesuit University since 1878</div>

 	<div class="cufooter">Creighton University - 2500 California Plaza - Omaha NE - 68178 - 402.280.2700 <br />

      Contact the <a href="mailto:webmaster@creighton.edu">Webmaster</a> - Copyright &copy;

      <!--###COPYRIGHTYEAR###-->

      2009

      <!--###COPYRIGHTYEAR###-->

      </div>

</div>
		<!--  Raw HTML content: [end] -->
			
	<!--  CONTENT ELEMENT, uid:143630/html [end] -->
		
	<!--  CONTENT ELEMENT, uid:149528/html [begin] -->
		<a id="c149528" class="csc-default" ></a>
		<!--  Raw HTML content: [begin] -->
			<!-- Start of StatCounter Code for Default Guide -->

<script type="text/javascript">

var sc_project=7346758; 

var sc_invisible=1; 

var sc_security="8a50faf0"; 

</script>

<script type="text/javascript"

src="http://www.statcounter.com/counter/counter.js"></script>

<noscript><div class="statcounter"><a title="custom

counter" href="http://statcounter.com/free-hit-counter/"

target="_blank"><img class="statcounter"

src="http://c.statcounter.com/7346758/0/8a50faf0/1/"

alt="custom counter"></a></div></noscript>

</div></div>

  </footer>

  </div>

  <div class="clear"></div>

</div>

<script type="text/javascript"> var _sf_async_config={uid:9652,domain:"creighton.edu"}; (function(){ function loadChartbeat() { window._sf_endpt=(new Date()).getTime(); var e = document.createElement('script'); e.setAttribute('language', 'javascript'); e.setAttribute('type', 'text/javascript'); e.setAttribute('src', (("https:" == document.location.protocol) ? "https://s3.amazonaws.com/" : "http://") + "static.chartbeat.com/js/chartbeat.js"); document.body.appendChild(e); } var oldonload = window.onload; window.onload = (typeof window.onload != 'function') ? loadChartbeat : function() { oldonload(); loadChartbeat(); }; })(); </script><script type="text/javascript">var _gaq = []; _gaq.push(['_setAccount', 'UA-393933-1']); _gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="http://www.creighton.edu/fileadmin/projects/core/scripts/jQuery/jquery-ui-1.8.11.custom.min.js?1302203297" type="text/javascript"></script>
<script src="http://www.creighton.edu/fileadmin/projects/Admissions/js/plugins.js?1307977296" type="text/javascript"></script>
<script src="http://tweet-it.st.pongsocket.com/tweet-it.js" type="text/javascript"></script>
<script src="http://www.creighton.edu/fileadmin/projects/Admissions/js/adm.js?1309470150" type="text/javascript"></script>


</body>

</html>
