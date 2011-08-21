<!DOCTYPE html>
<html lang="fi">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>hamk.01.fi</title>
	<link rel="stylesheet" href="tyylit.css">
	<link rel="shortcut icon" href="favicon.ico">
	<!--[if lt IE 9]>
		<script src="/ie.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-19800650-1']);
		_gaq.push(['_setDomainName', '.01.fi']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body>
	<header>
		<h1><a href="/" title="hamk.01.fi"><span>hamk</span>.01.fi</a></h1>
		<nav>
			<ul>
				<li><a href="#linkit" title="Linkkeihin">Linkit</a></li>
<?php if($this->menu!=NULL) echo "\t\t\t\t",'<li><a href="#ruokalista" title="Ruokalistaan">Ruokalista</a></li>',"\n"; if($this->feeds!=NULL) echo "\t\t\t\t",'<li><a href="#ajankohtaista" title="Ajankohtaisiin">Ajankohtaista</a></li>',"\n"; ?>
				<li><a href="#lukujarjestykset" title="Lukujärjestyksiin">Lukujärjestykset</a></li>
				<li><a href="/tmp" title="h.01.fi/tmp">/tmp</a></li>
			</ul>
		</nav>
	</header>
	<section id="linkit">
		<h2>Linkit</h2>
		<ul>
			<li>Opiskelu ja opetus</li>
			<li><a href="http://portal.hamk.fi/portal/page/portal/Oskari/Tietotekniikka/Tietotekniikka_Riihimaki" title="opiskelijaportaali">Oskari</a></li>
			<li><a href="https://moodle2.hamk.fi/" title="verkko-oppimisympäristö">Moodle</a></li>
			<li><a href="https://soleops.hamk.fi/opsnet/" title="opetussuunnitelma">eHOPS</a></li>
			<li><a href="https://wille.hamk.fi/" title="opiskelijasivut">WinhaWille</a></li>
			<li><a href="http://hamk.fi/" title="Hämeen ammattikorkeakoulu">HAMK</a></li>
			<li><a href="https://vanaicat.amkit.fi/cgi-bin/Pwebrecon.cgi?LANGUAGE=finnish&amp;DB=local&amp;PAGE=First">Kirjasto</a></li>
			<li><a href="https://proxy.hamk.fi/login?url=http://mot.kielikone.fi/mot/hamkk/netmot.exe?motportal=80" title="kielikone">MOT</a></li>
		</ul>
		<ul>
			<li>Tietohallinnon palvelut</li>
			<li><a href="https://wm2.hamk.fi/gw/webacc" title="sähköposti">Webmail</a></li>
			<li><a href="https://nestori.hamk.fi/NetStorage/" title="tiedostopalvelin">Netstorage</a></li>
			<li><a href="https://vdi.hamk.fi/" title="virtualisointi">VMware View Portal</a></li>
			<li><a href="https://helpdesk.hamk.fi/" title="HAMK IT-palvelut">HelpDesk</a></li>
			<li><a href="https://nestori.hamk.fi/vo">Salasananvaihto</a></li>
			<li><a href="https://apps.hamk.fi/" title="Web Interface">Citrix</a></li>
			<li><a href="http://aalto.webex.com/" title="verkkokokoukset">WebEx</a></li>
			<li><a href="http://msdn63.e-academy.com/hamk_it" title="Microsoftin ohjelmistoja">MSDNAA</a></li>
		</ul>
		<ul>
			<li>etc</li>
			<li><a href="http://hyria.fi/opiskelu_hyriassa/lounaskahvilat/ruokakellon_ruokalista/" title="Hyria, Ruokakello">Ruokalista</a></li>
			<li><a href="https://docs.google.com/viewer?url=http://portal.hamk.fi/portal/page/portal/Yhteinen_Dokumenttikirjasto/opiskelijan_polku_hamk/opetusta_ohjaavat_saannot_ja_ohjeet/tiedostopankki/Opasvarasto/Yleisoppaan_kalenteri_10-11_st_1.pdf" title="voimassa oleva lukuvuosikalenteri">Kalenteri</a></li>
			<li><a href="http://hamko.fi/" title="HAMK opiskelijakunta">HAMKO</a></li>
			<li><a href="https://wiki.hamk.fi/">Wiki</a></li>
			<li><a href="http://foreca.com/Finland/Riihimaki?details" title="Riihimäki">Sää</a></li>
			<li><a href="http://cisco.netacad.net/" title="oppimateriaali">Cisco Networking Academy</a></li>
		</ul>
		<ul> 
			<li>HAMKin sisäverkossa</li> 
			<li><a href="https://labman.hamk.fi" title="virtualisointi">Lab Manager</a></li> 
			<li><a href="https://vcmsstu.hamk.fi/ui" title="virtualisointi">vSphere Web Access</a></li> 
			<li><a href="http://cisco:systems@ciscoaca.rmk.hamk.fi/" title="oppimateriaali">Cisco CCNA</a></li> 
		</ul>
	</section>
<?php echo $this->content;?>
	<section id="lukujarjestykset">
		<h2>Lukujärjestykset</h2>
		<table>
			<thead>
				<tr>
					<th>IT09</th>
					<th>Maanantai</th>
					<th>Tiistai</th>
					<th>Keskiviikko</th>
					<th>Torstai</th>
					<th>Perjantai</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>08:00</th>
					<td></td>
					<td>Matematiikka 3A<br/>A208</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>09:00</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>10:00</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>11:00</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>12:30</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>13:30</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>14:30</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>15:30</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>16:30</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<ul>
			<li>Tietotekniikka</li>
			<li><a href="/lukujarjestykset/it10.htm">10</a></li>
			<li><a href="/lukujarjestykset/it09.htm">09</a></li>
			<li><a href="/lukujarjestykset/it08.htm">08</a></li>
		</ul>
		<ul>
			<li>Konetekniikka</li>
			<li><a href="/lukujarjestykset/ik10.htm">11</a></li>
			<li><a href="/lukujarjestykset/ik10.htm">10</a></li>
			<li><a href="/lukujarjestykset/ik09.htm">09</a></li>
			<li><a href="/lukujarjestykset/ik08.htm">08</a></li>
		</ul>
		<ul>
			<li>Liikenne</li>
			<li><a href="/lukujarjestykset/il10.htm">11</a></li>
			<li><a href="/lukujarjestykset/il10.htm">10</a></li>
			<li><a href="/lukujarjestykset/il09.htm">09</a></li>
			<li><a href="/lukujarjestykset/il08.htm">08</a></li>
		</ul>
		<ul>
			<li>Mechanical Engineering</li>
			<li><a href="/lukujarjestykset/bmp10.htm">11</a></li>
			<li><a href="/lukujarjestykset/bmp10.htm">10</a></li>
			<li><a href="/lukujarjestykset/bmp09.htm">09</a></li>
			<li><a href="/lukujarjestykset/bmp08.htm">08</a></li>
		</ul>
		<ul>
			<li>Meediotekniikka</li>
			<li><a href="/lukujarjestykset/im11.htm">11</a></li>
			<li><a href="/lukujarjestykset/im10.htm">10</a></li>
			<li><a href="/lukujarjestykset/im09.htm">09</a></li>
			<li><a href="/lukujarjestykset/im08.htm">08</a></li>
		</ul>
		<ul>
			<li>Tuotekehitys</li>
			<li><a href="/lukujarjestykset/itk10.htm">11</a></li>
			<li><a href="/lukujarjestykset/itk10.htm">10</a></li>
			<li><a href="/lukujarjestykset/itk09.htm">09</a></li>
			<li><a href="/lukujarjestykset/itk08.htm">08</a></li>
		</ul>
	</section>
	<footer>
		<p>Päivitetty <time datetime="<?php echo date('Y-m-d');?>"><?php echo date('H:i d.m.Y');?></time></p>
	</footer>
</body>
</html>