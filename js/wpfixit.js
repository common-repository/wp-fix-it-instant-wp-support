//doesn't block the load event
function createIframe(){
  var i = document.createElement("iframe");
  i.src = "https://tickets.wpfixit.com/widgets/feedback_widget/new?&widgetType=embedded&formTitle=Please+Submit+Your+Issue+Details+Below&submitThanks=Thank+you!++Please+check+your+email+for+the+next+set+of+instructions+on+getting+your+issue+resolved+as+fast.&screenshot=no&searchArea=no";
  i.scrolling = "no";
  i.frameborder = "0";
  i.width = "100%";
  i.height = "800px";
  i.class="freshwidget-embedded-form";
  i.id = "freshwidget-embedded-form";
  document.getElementById("wpfixit_iframe").appendChild(i);
};
	
// Check for browser support of event handling capability
if (window.addEventListener)
window.addEventListener("load", createIframe, false);
else if (window.attachEvent)
window.attachEvent("onload", createIframe);
else window.onload = createIframe;

