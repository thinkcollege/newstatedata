/**
 * @file
 * D3.js statetooltip extensions
 */
(function($) {
  d3 = d3 || {};

  /**
   * Creates a tooltip-like popup in svg
   *
   * @param tipjar
   *   Container to put the tooltip
   * @param x
   *   X axis of container group
   * @param y
   *   Y axis of container group
   * @param txt
   *   Text to display inside the popup
   *   @todo make more customizable
   * @param h
   *   height of container group
   * @param w
   *   width of container group
   */
  d3.statetooltip = function(currentstate,tipjar, txt, h, w, mod) {

    var statetooltip = {
      w: w,
      h: h,
      // The width of the triangular tip as it is on the base
      tipW: 12,
      // Tip length, vertically
      tipL: 9,
      // Tip offset point, from the very tip to the middle of the square
      tipO: 22,
    };

    var svg = tipjar.node();
    while (svg.tagName != "svg" && svg.parentNode) {
      svg = svg.parentNode;
    }
    w = parseInt(svg.attributes.width.textContent, 10);
    h = parseInt(svg.attributes.height.textContent, 10);

    //Precomputing the x and y attributes is difficult. Need to find a new way.
    //console.log(tipjar.node().getBBox());

    // Create a container for the paths specifically
    var img = tipjar.append("g");
    // Creates 3 identical paths with different opacities
    // to create a shadow effect
    for (var x = 2; x >= 0; x--) {
      img.append('path')
        .attr("d", function(d) { return "M0,0"
        + 'l' + statetooltip.tipO+',-' + statetooltip.tipL
        + 'l' + ((statetooltip.w / 2) - statetooltip.tipW) + ',0'
        + 'l0,-' + statetooltip.h + ''
        + 'l-' + statetooltip.w + ',0'
        + 'l0, ' + statetooltip.h
        + 'l' + (statetooltip.w / 2) +',0'
        + "L0,0"; })
        .attr("fill", function(d) { return (x == 0) ? '#fff' : '#ccc'; })
        .attr('transform', function(d) { return 'translate(' + x + ',' + x + ')';  })
        .attr('stroke', '#ccc')
        .attr('fill-opacity', function(d) {
          switch (x) {
            case 0:
              return 1;
              break;

            case 1:
              return 0.6;
              break;

            case 2:
              return 0.4;
              break;

          }
        })
        .attr('stroke-width', function(d) { return (x == 0) ? 1 : 0; });
    }

    var offset = (statetooltip.w / 2) - (statetooltip.tipO - statetooltip.tipW);

    var textbox = tipjar.append('g')
      .attr('class', 'text')
      .attr('transform', function(d) { return 'translate(-' + offset + ',-' + statetooltip.h + ')'});

      if(mod == "chart") {
    textbox.append('text')
      .text(currentstate + ": " + txt + "%")
      .attr('text-anchor', 'start')
      .attr('dx', 5)
      .attr('dy', 25)
      .attr('font-family', 'Arial,sans-serif')
      .attr('font-size', '12')
      .attr('font-weight', 'normal');
    } else if (mod == "data") {
     if(txt.indexOf(".") <= -1) {
        var tipconc = currentstate + ": " + parseInt(txt,10).toLocaleString("en-US")} else { var tipconc = currentstate + ": " + parseFloat(txt).toLocaleString("en-US") }
      
      textbox.append('text')
    .text(tipconc)
        .attr('text-anchor', 'start')
        .attr('dx', 5)
        .attr('dy', 25)
        .attr('font-family', 'Arial,sans-serif')
        .attr('font-size', '12')
        .attr('font-weight', 'normal');
      }
  }

})(jQuery);
