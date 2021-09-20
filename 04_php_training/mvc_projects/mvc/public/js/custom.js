$(document).on("change","select",function(){
  $("option[value=" + this.value + "]", this)
    .attr("selected", true).siblings()
    .removeAttr("selected")
});