var isMobile = window.orientation > -1;
  if(isMobile){
    $("#accordionSidebar").addClass("toggled");
  }
  else{
    $("#accordionSidebar").removeClass("toggled");
  }