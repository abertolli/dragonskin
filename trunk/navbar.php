<?php if (is_dynamic_sidebar('top-menu')) : ?>

<table><tr><td>
<!-- Son of Suckerfish -->
<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>
<br />

<ul id="nav">
<?php dynamic_sidebar('top-menu'); ?>
</ul>

<br />
</td></tr></table>

<?php endif; ?>
