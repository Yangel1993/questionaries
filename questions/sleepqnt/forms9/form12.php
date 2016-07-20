 <?php
      error_reporting(0);
      session_start();
      require_once 'db.php';
if(isset($_REQUEST['submitform']))
{
	$formid = 12;
    $result=executeQuery("select formid from ".$_SESSION['studentname']." where formid = ".$formid.";");
	$r=mysql_fetch_array($result);
	$error = false;
    if(mysql_num_rows($result) != 0){
		$query="delete from  ".$_SESSION['studentname']." where formid =".$formid.";";
		if(!executeQuery($query))
		{
		$error = true;
		$_GLOBALS['message']="Can't drop database". mysql_error();
		goto end;
		}
	}
    for($i=1; $i<=88; $i++)
	{
		$iname = 'twelve'.$i;
		$query = "INSERT ".$_SESSION['studentname']." (formid, questionid, answer) value('".$formid."','".$i."','".htmlspecialchars($_REQUEST[$iname],ENT_QUOTES)."');";
		if(!executeQuery($query))
		{
		$error = true;		
		$_GLOBALS['message']="Your previous answer is not updated.Please answer once again". mysql_error();
		break;
		}
	}
	closedb();
	if(!$error)
	{
		header('Location: ../finish.html');
	}
	end:
		unset($_REQUEST['submitform']);
		echo $_GLOBALS['message'];
}
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
<title>form12</title>
<link href="../style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://www.w3cschool.cn/jquery.js"></script>
<script src="../scripts/jquery.js" type="text/javascript"></script>
<script src="../scripts/validateForm.js" type="text/javascript"></script>
<style type="text/css">
	#wrap .page{padding-left:290px;}
	.m2,.m3,.m4,.m5,.m6{padding-top:20px;}
	.main ul li{list-style:none;font-size:17px;height:24px;line-height:24px;}
	.main ul li:after{content:".";height:0;visibility:hidden;display:block;clear:both; }
	span input{margin-left:15px;}
	span.left{float:left;}
	span.right{float:right;}
	.m1 p{margin:0 0 10px 0;}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="../images/header.png"/>
	</div>
	<div id="middle">
		<div id="content">
			<h1>艾森克个性问卷（成人）</h1>
			<div id="wrap">
				<div class="main">
					<form action="" method="post" name="form2" onsubmit="return checkFull(20);">
				<!--page1-->
					<div class="m1 mbox">
						<p>下面有88个问题，请你依次回答这些问题，选择“是”或“否”。这些问题要求你按自己的实际情况回答，不要去猜测怎样才是正确的回答。因为这里不存在正确或错误的回答，也没有捉弄人的问题，将问题的意思看懂了就快点回答，不要花很多时间去想。答题无时间限制，但不要拖延太长，也不要未看懂问题便回答。请务必注意每一条都要回答。</p>
						<ul>
							<li><span class="left">1  你是否有许多不同的业余爱好？</span><span class="right"><input type="radio" name="twelve1" value="1">是<input type="radio" name="twelve1" value="0">否</span></li>
							<li><span class="left">2  你是否在做任何事情以前都要停下来仔细思考？</span><span class="right"><input type="radio" name="twelve2" value="1">是<input type="radio" name="twelve2" value="0">否</span></li>
							<li><span class="left">3  你的心境是否常有起伏？</span><span class="right"><input type="radio" name="twelve3" value="1">是<input type="radio" name="twelve3" value="0">否</span></li>
							<li><span class="left">4  你曾有过明知是别人的功劳而你去接受奖励的事吗？</span><span class="right"><input type="radio" name="twelve4" value="1">是<input type="radio" name="twelve4" value="0">否</span></li>
							<li><span class="left">5  你是否健谈？</span><span class="right"><input type="radio" name="twelve5" value="1">是<input type="radio" name="twelve5" value="0">否</span></li>
							<li><span class="left">6  欠债会使你不安吗？</span><span class="right"><input type="radio" name="twelve6" value="1">是<input type="radio" name="twelve6" value="0">否</span></li>
							<li><span class="left">7  你曾无缘无故觉得“真是难受”吗？</span><span class="right"><input type="radio" name="twelve7" value="1">是<input type="radio" name="twelve7" value="0">否</span></li>
							<li><span class="left">8  你曾经贪图过份外之物吗？</span><span class="right"><input type="radio" name="twelve8" value="1">是<input type="radio" name="twelve8" value="0">否</span></li>
							<li><span class="left">9  你是否在晚上小心翼翼地关好门窗？</span><span class="right"><input type="radio" name="twelve9" value="1">是<input type="radio" name="twelve9" value="0">否</span></li>
							<li><span class="left">10 你是否比较活跃？</span><span class="right"><input type="radio" name="twelve10" value="1">是<input type="radio" name="twelve10" value="0">否</span></li>
							<li><span class="left">11 你在见到一小孩或一动物受折磨时是否会感到非常难过？</span><span class="right"><input type="radio" name="twelve11" value="1">是<input type="radio" name="twelve11" value="0">否</span></li>
							<li><span class="left">12 你是否常常为自己不该做而做了的事，不该说而说了的话而紧张吗？</span><span class="right"><input type="radio" name="twelve12" value="1">是<input type="radio" name="twelve12" value="0">否</span></li>
							<li><span class="left">13 你喜欢跳降落伞吗？</span><span class="right"><input type="radio" name="twelve13" value="1">是<input type="radio" name="twelve13" value="0">否</span></li>
							<li><span class="left">14 通常你能在热闹联欢会上尽情地玩吗？</span><span class="right"><input type="radio" name="twelve14" value="1">是<input type="radio" name="twelve14" value="0">否</span></li>
							<li><span class="left">15 你容易激动吗？</span><span class="right"><input type="radio" name="twelve15" value="1">是<input type="radio" name="twelve15" value="0">否</span></li>
							<li><span class="left">16 你曾经将自己的过错推给别人吗？</span><span class="right"><input type="radio" name="twelve16" value="1">是<input type="radio" name="twelve16" value="0">否</span></li>
							<li><span class="left">17 你喜欢会见陌生人吗？</span><span class="right"><input type="radio" name="twelve17" value="1">是<input type="radio" name="twelve17" value="0">否</span></li>
						</ul>

					</div>
				<!--page2-->
					<div class="m2 mbox">
							<ul>
							<li><span class="left">18 你是否相信保险制度是一种好办法？</span><span class="right"><input type="radio" name="twelve18" value="1">是<input type="radio" name="twelve18" value="0">否</span></li>
							<li><span class="left">19 你是一个容易伤感情的人吗？</span><span class="right"><input type="radio" name="twelve19" value="1">是<input type="radio" name="twelve19" value="0">否</span></li>
							<li><span class="left">20 你所有的习惯都是好的吗？</span><span class="right"><input type="radio" name="twelve20" value="1">是<input type="radio" name="twelve20" value="0">否</span></li>
							<li><span class="left">21 在社交场合你是否总不愿露头角？</span><span class="right"><input type="radio" name="twelve21" value="1">是<input type="radio" name="twelve21" value="0">否</span></li>
							<li><span class="left">22 你会服用有奇异或危险作用的药物吗？</span><span class="right"><input type="radio" name="twelve22" value="1">是<input type="radio" name="twelve22" value="0">否</span></li>
							<li><span class="left">23 你常有“厌倦”之感吗？</span><span class="right"><input type="radio" name="twelve23" value="1">是<input type="radio" name="twelve23" value="0">否</span></li>
							<li><span class="left">24 你曾拿过别人的东西（哪怕一针一线）吗？</span><span class="right"><input type="radio" name="twelve24" value="1">是<input type="radio" name="twelve24" value="0">否</span></li>
							<li><span class="left">25 你是否常爱外出？</span><span class="right"><input type="radio" name="twelve25" value="1">是<input type="radio" name="twelve25" value="0">否</span></li>
							<li><span class="left">26 你是否从伤害你所宠爱的人而感到乐趣？</span><span class="right"><input type="radio" name="twelve26" value="1">是<input type="radio" name="twelve26" value="0">否</span></li>
							<li><span class="left">27 你常为有罪恶之感所苦恼吗？</span><span class="right"><input type="radio" name="twelve27" value="1">是<input type="radio" name="twelve27" value="0">否</span></li>
							<li><span class="left">28 你在谈论中是否有时不懂装懂？</span><span class="right"><input type="radio" name="twelve28" value="1">是<input type="radio" name="twelve28" value="0">否</span></li>
							<li><span class="left">29 你是否宁愿去看些书而不愿去多见人？</span><span class="right"><input type="radio" name="twelve29" value="1">是<input type="radio" name="twelve29" value="0">否</span></li>
							<li><span class="left">30 你有要伤害你的仇人吗？</span><span class="right"><input type="radio" name="twelve30" value="1">是<input type="radio" name="twelve30" value="0">否</span></li>
							<li><span class="left">31 你觉得自己是一个神经过敏的人吗？</span><span class="right"><input type="radio" name="twelve31" value="1">是<input type="radio" name="twelve31" value="0">否</span></li>
							<li><span class="left">32 对人有所失礼时你是否经常要表示歉意？</span><span class="right"><input type="radio" name="twelve32" value="1">是<input type="radio" name="twelve32" value="0">否</span></li>
							<li><span class="left">33 你有许多朋友吗？</span><span class="right"><input type="radio" name="twelve33" value="1">是<input type="radio" name="twelve33" value="0">否</span></li>
							<li><span class="left">34 你是否喜爱讲些有时确能伤害人的笑话？</span><span class="right"><input type="radio" name="twelve34" value="1">是<input type="radio" name="twelve34" value="0">否</span></li>
							<li><span class="left">35 你是一个多忧多虑的人吗？</span><span class="right"><input type="radio" name="twelve35" value="1">是<input type="radio" name="twelve35" value="0">否</span></li>
							<li><span class="left">36 你在童年是否按照吩咐要做什么便做什么，毫无怨言？</span><span class="right"><input type="radio" name="twelve36" value="1">是<input type="radio" name="twelve36" value="0">否</span></li>
							<li><span class="left">37 你认为你是一个乐天派吗？</span><span class="right"><input type="radio" name="twelve37" value="1">是<input type="radio" name="twelve37" value="0">否</span></li>
							<li><span class="left">38 你很讲究礼貌和整洁吗？</span><span class="right"><input type="radio" name="twelve38" value="1">是<input type="radio" name="twelve38" value="0">否</span></li>
							<li><span class="left">39 你是否总在担心会发生可怕的事情？</span><span class="right"><input type="radio" name="twelve39" value="1">是<input type="radio" name="twelve39" value="0">否</span></li>
							<li><span class="left">40 你曾损坏或遗失过别人的东西吗？</span><span class="right"><input type="radio" name="twelve40" value="1">是<input type="radio" name="twelve40" value="0">否</span></li>
							<li><span class="left">41 交新朋友时一般是你采取主动吗？</span><span class="right"><input type="radio" name="twelve41" value="1">是<input type="radio" name="twelve41" value="0">否</span></li>
							<li><span class="left">42 当别人向你诉苦时，你是否容易理解他们的苦衷？</span><span class="right"><input type="radio" name="twelve42" value="1">是<input type="radio" name="twelve42" value="0">否</span></li>
						</ul>
					</div>
			<!--page3-->
					<div class="m3 mbox">
							<ul>												
							<li><span class="left">43 你认为自己很紧张，如同“拉紧的弦”一样吗？</span><span class="right"><input type="radio" name="twelve43" value="1">是<input type="radio" name="twelve43" value="0">否</span></li>
							<li><span class="left">44 在没有废纸篓时，你是否将废纸扔在地板上？</span><span class="right"><input type="radio" name="twelve44" value="1">是<input type="radio" name="twelve44" value="0">否</span></li>
							<li><span class="left">45 当你与别人在一起时，你是否言语很少？</span><span class="right"><input type="radio" name="twelve45" value="1">是<input type="radio" name="twelve45" value="0">否</span></li>
							<li><span class="left">46 你是否认为结婚制度是过时了，应该废止？</span><span class="right"><input type="radio" name="twelve46" value="1">是<input type="radio" name="twelve46" value="0">否</span></li>
							<li><span class="left">47 你是否有时感到自己可怜？</span><span class="right"><input type="radio" name="twelve47" value="1">是<input type="radio" name="twelve47" value="0">否</span></li>
							<li><span class="left">48 你是否有时有点自夸？</span><span class="right"><input type="radio" name="twelve48" value="1">是<input type="radio" name="twelve48" value="0">否</span></li>
							<li><span class="left">49 你是否很容易将一个沉寂的集会搞得活跃起来？</span><span class="right"><input type="radio" name="twelve49" value="1">是<input type="radio" name="twelve49" value="0">否</span></li>
							<li><span class="left">50 你是否讨厌那种小心翼翼地开车的人？</span><span class="right"><input type="radio" name="twelve50" value="1">是<input type="radio" name="twelve50" value="0">否</span></li>
							<li><span class="left">51 你为你的健康担忧吗？</span><span class="right"><input type="radio" name="twelve51" value="1">是<input type="radio" name="twelve51" value="0">否</span></li>
							<li><span class="left">52 你曾讲过什么人的坏话吗？</span><span class="right"><input type="radio" name="twelve52" value="1">是<input type="radio" name="twelve52" value="0">否</span></li>
							<li><span class="left">53 你是否喜欢对朋友讲笑话和有趣的故事？</span><span class="right"><input type="radio" name="twelve53" value="1">是<input type="radio" name="twelve53" value="0">否</span></li>
							<li><span class="left">54 你小时曾对父母粗暴无礼吗？</span><span class="right"><input type="radio" name="twelve54" value="1">是<input type="radio" name="twelve54" value="0">否</span></li>
							<li><span class="left">55 你是否喜欢与人混在一起？</span><span class="right"><input type="radio" name="twelve55" value="1">是<input type="radio" name="twelve55" value="0">否</span></li>
							<li><span class="left">56 你如知道自己工作有错误，这会使你感到难过吗？</span><span class="right"><input type="radio" name="twelve56" value="1">是<input type="radio" name="twelve56" value="0">否</span></li>
							<li><span class="left">57 你患失眠吗？</span><span class="right"><input type="radio" name="twelve57" value="1">是<input type="radio" name="twelve57" value="0">否</span></li>
							<li><span class="left">58 你吃饭前必定洗手吗？</span><span class="right"><input type="radio" name="twelve58" value="1">是<input type="radio" name="twelve58" value="0">否</span></li>
							<li><span class="left">59 你常无缘无故感到无精打采和倦怠吗？</span><span class="right"><input type="radio" name="twelve59" value="1">是<input type="radio" name="twelve59" value="0">否</span></li>
							<li><span class="left">60 和别人玩游戏时，你有过欺骗行为吗？</span><span class="right"><input type="radio" name="twelve60" value="1">是<input type="radio" name="twelve60" value="0">否</span></li>
							<li><span class="left">61 你是否喜欢从事一些动作迅速的工作？</span><span class="right"><input type="radio" name="twelve61" value="1">是<input type="radio" name="twelve61" value="0">否</span></li>
							<li><span class="left">62 你的母亲是一位善良的妇人吗？</span><span class="right"><input type="radio" name="twelve62" value="1">是<input type="radio" name="twelve62" value="0">否</span></li>
							<li><span class="left">63 你是否常常觉得人生非常无味？</span><span class="right"><input type="radio" name="twelve63" value="1">是<input type="radio" name="twelve63" value="0">否</span></li>
							<li><span class="left">64 你曾利用过某人为自己取得好处吗？</span><span class="right"><input type="radio" name="twelve64" value="1">是<input type="radio" name="twelve64" value="0">否</span></li>
							<li><span class="left">65 你是否常常参加许多活动，超过你的时间所允许？</span><span class="right"><input type="radio" name="twelve65" value="1">是<input type="radio" name="twelve65" value="0">否</span></li>
							<li><span class="left">66 是否有几个人总在躲避你？</span><span class="right"><input type="radio" name="twelve66" value="1">是<input type="radio" name="twelve66" value="0">否</span></li>
							<li><span class="left">67 你是否为你的容貌而非常烦恼？</span><span class="right"><input type="radio" name="twelve67" value="1">是<input type="radio" name="twelve67" value="0">否</span></li>
						</ul>
					</div>
			<!--page4-->
					<div class="m4 mbox">
							<ul>
							
							<li><span class="left">68 你是否觉得人们为了未来有保障而办理储蓄和保险所花的时间太多？</span><span class="right"><input type="radio" name="twelve68" value="1">是<input type="radio" name="twelve68" value="0">否</span></li>
							<li><span class="left">69 你曾有过不如死了为好的愿望吗？</span><span class="right"><input type="radio" name="twelve69" value="1">是<input type="radio" name="twelve69" value="0">否</span></li>
							<li><span class="left">70 如果有把握永远不会被人发现，你会逃税吗？</span><span class="right"><input type="radio" name="twelve70" value="1">是<input type="radio" name="twelve70" value="0">否</span></li>
							<li><span class="left">71 你能使一个集会顺利进行吗？</span><span class="right"><input type="radio" name="twelve71" value="1">是<input type="radio" name="twelve71" value="0">否</span></li>
							<li><span class="left">72 你能克制自己不对人无礼吗？</span><span class="right"><input type="radio" name="twelve72" value="1">是<input type="radio" name="twelve72" value="0">否</span></li>
							<li><span class="left">73 遇到一次难堪的经历后，你是否在一段长时间内还感到难受？</span><span class="right"><input type="radio" name="twelve73" value="1">是<input type="radio" name="twelve73" value="0">否</span></li>
							<li><span class="left">74 你患有“神经过敏”吗？</span><span class="right"><input type="radio" name="twelve74" value="1">是<input type="radio" name="twelve74" value="0">否</span></li>
							<li><span class="left">75 你曾经故意说些什么来伤害别人的感情吗？</span><span class="right"><input type="radio" name="twelve75" value="1">是<input type="radio" name="twelve75" value="0">否</span></li>
							<li><span class="left">76 你与别人的友谊是否容易破裂，虽然不是你的过错？</span><span class="right"><input type="radio" name="twelve76" value="1">是<input type="radio" name="twelve76" value="0">否</span></li>
							<li><span class="left">77 你常感到孤单吗？</span><span class="right"><input type="radio" name="twelve77" value="1">是<input type="radio" name="twelve77" value="0">否</span></li>
							<li><span class="left">78 当人家寻你的差错，找你工作中的缺点时，你是否容易在精神上受挫伤？</span><span class="right"><input type="radio" name="twelve78" value="1">是<input type="radio" name="twelve78" value="0">否</span></li>
							<li><span class="left">79 你赴约会或上班曾迟到过吗？</span><span class="right"><input type="radio" name="twelve79" value="1">是<input type="radio" name="twelve79" value="0">否</span></li>
							<li><span class="left">80 你喜欢忙忙碌碌和热热闹闹地过日子吗？</span><span class="right"><input type="radio" name="twelve80" value="1">是<input type="radio" name="twelve80" value="0">否</span></li>
							<li><span class="left">81 你愿意别人怕你吗？</span><span class="right"><input type="radio" name="twelve81" value="1">是<input type="radio" name="twelve81" value="0">否</span></li>
							<li><span class="left">82 你是否觉得有时浑身是劲，而有时又是懒洋洋的吗？</span><span class="right"><input type="radio" name="twelve82" value="1">是<input type="radio" name="twelve82" value="0">否</span></li>
							<li><span class="left">83 你有时把今天应做的事拖到明天去做吗？</span><span class="right"><input type="radio" name="twelve83" value="1">是<input type="radio" name="twelve83" value="0">否</span></li>
							<li><span class="left">84 别人认为你是生气勃勃的吗？</span><span class="right"><input type="radio" name="twelve84" value="1">是<input type="radio" name="twelve84" value="0">否</span></li>
							<li><span class="left">85 别人是否对你说了许多谎话？</span><span class="right"><input type="radio" name="twelve85" value="1">是<input type="radio" name="twelve85" value="0">否</span></li>
							<li><span class="left">86 你是否对某些事物容易冒火？</span><span class="right"><input type="radio" name="twelve86" value="1">是<input type="radio" name="twelve86" value="0">否</span></li>
							<li><span class="left">87 当你犯了错误时，你是否常常愿意承认它？</span><span class="right"><input type="radio" name="twelve87" value="1">是<input type="radio" name="twelve87" value="0">否</span></li>
							<li><span class="left">88 你会为一动物落入圈套被捉拿而感到很难过吗？</span><span class="right"><input type="radio" name="twelve88" value="1">是<input type="radio" name="twelve88" value="0">否</span></li>
						</ul>
						<br style="clear:left;"/><br/>
						<input type="reset" value="重置" class="button2">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" name= "submitform" value="提交" class="button2">
					</div>
			<!--page5-->
					<div class="m5 mbox">
						

						
				</div>

					</form>
				</div>
				<div class="page">
					<div>第</div>
					<ul class="menu">
						<li class="l1">1</li>
						<li class="l2">2</li>	
						<li class="l3">3</li>
						<li class="l4">4</li>
						
					</ul>
					<div>页</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footer_content">
			<div class="footer_copy">Copyright © 2014 - All Rights Reserved - <a href="http://123.1.157.52">www.sleep-china.cn</a></div>
		</div>
	</div>
</div>

</body>
</html>