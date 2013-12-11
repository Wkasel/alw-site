this["alw"] = this["alw"] || {};
this["alw"]["templates"] = this["alw"]["templates"] || {};

this["alw"]["templates"]["app"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "\n<div id=\"app\">\n  <div class=\"sidetap\">\n    <div class=\"stp-nav\">\n      <div>\n        <nav></nav>\n      </div>\n      <div id=\"nav-bottom\" class=\"nav-bottom\"><span><a href=\"http://www.archltgworks.com?nomo\">Full Site</a></span><span>&copy; 2013 Architectural Lighting Works</span></div>\n    </div>\n    <div id=\"content\" class=\"stp-content\">\n      <header class=\"stp-fake-header\"></header>\n      <div class=\"stp-overlay nav-toggle\"> </div>\n      <div class=\"stp-content-panel\">\n        <header><a href=\"javascript:void(0)\" class=\"header-button icon menu\"><span>Menu</span></a>\n          <div id=\"logo\"></div>\n        </header>\n        <div class=\"content stp-content-frame\">\n          <div class=\"scrollNav\">\n            <div id=\"page-content\" class=\"stp-content-body scrollNav\"></div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>";
  });

this["alw"]["templates"]["contact"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, stack2, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <div class=\"row\">\n    <div class=\"contact\"><span> <img src=\"http://www.archltgworks.com/source/images/team/";
  if (stack1 = helpers.t_image) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.t_image; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\"/></span><span>";
  if (stack1 = helpers.t_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.t_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</span><span>";
  if (stack1 = helpers.t_position) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.t_position; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</span><span>";
  if (stack1 = helpers.t_phone) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.t_phone; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + " (Ph)</span><span>";
  if (stack1 = helpers.t_fax) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.t_fax; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + " (FX)</span><span> <a href=\"mailto:";
  if (stack1 = helpers.t_email) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.t_email; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">Email ";
  if (stack1 = helpers.name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</a></span></div>\n  </div>";
  return buffer;
  }

  buffer += "\n<div id=\"contact-us\">";
  stack2 = helpers.each.call(depth0, ((stack1 = depth0.data),stack1 == null || stack1 === false ? stack1 : stack1.usa), {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n</div>";
  return buffer;
  });

this["alw"]["templates"]["events"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "\n<div id=\"events\">\n  <div class=\"row\">\n    <div id=\"event-calendar\" class=\"col-xs-12\"></div>\n  </div>\n</div>";
  });

this["alw"]["templates"]["find"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n    <div class=\"row\">\n      <div class=\"col-xs-12\"> \n        <h2>";
  if (stack1 = helpers.office_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.office_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</h2>\n        <p>";
  if (stack1 = helpers.office_desc) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.office_desc; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n        <p>";
  if (stack1 = helpers.office_address) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.office_address; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += ", ";
  if (stack1 = helpers.office_country) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.office_country; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n        <p>";
  if (stack1 = helpers.office_url) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.office_url; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>";
  return buffer;
  }

  buffer += "\n<div id=\"find-rep\" class=\"content\">\n  <div class=\"row\">\n    <div id=\"search-form\" class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-12\">\n          <h2>Find a Rep.</h2>\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-xs-12\">\n          <select id=\"rep-country\" class=\"xl-input form-control\">\n            <option value=\"usa\">USA</option>\n            <option value=\"uk\">UK</option>\n            <option value=\"canada\">Canada</option>\n          </select>\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-xs-12\">\n          <select name=\"State\" id=\"rep-state\" class=\"xl-input form-control\">\n            <option value=\"\" selected=\"selected\">Select a State</option>\n            <option value=\"AL\">Alabama</option>\n            <option value=\"AK\">Alaska</option>\n            <option value=\"AZ\">Arizona</option>\n            <option value=\"AR\">Arkansas</option>\n            <option value=\"CA\">California</option>\n            <option value=\"CO\">Colorado</option>\n            <option value=\"CT\">Connecticut</option>\n            <option value=\"DE\">Delaware</option>\n            <option value=\"DC\">District Of Columbia</option>\n            <option value=\"FL\">Florida</option>\n            <option value=\"GA\">Georgia</option>\n            <option value=\"HI\">Hawaii</option>\n            <option value=\"ID\">Idaho</option>\n            <option value=\"IL\">Illinois</option>\n            <option value=\"IN\">Indiana</option>\n            <option value=\"IA\">Iowa</option>\n            <option value=\"KS\">Kansas</option>\n            <option value=\"KY\">Kentucky</option>\n            <option value=\"LA\">Louisiana</option>\n            <option value=\"ME\">Maine</option>\n            <option value=\"MD\">Maryland</option>\n            <option value=\"MA\">Massachusetts</option>\n            <option value=\"MI\">Michigan</option>\n            <option value=\"MN\">Minnesota</option>\n            <option value=\"MS\">Mississippi</option>\n            <option value=\"MO\">Missouri</option>\n            <option value=\"MT\">Montana</option>\n            <option value=\"NE\">Nebraska</option>\n            <option value=\"NV\">Nevada</option>\n            <option value=\"NH\">New Hampshire</option>\n            <option value=\"NJ\">New Jersey</option>\n            <option value=\"NM\">New Mexico</option>\n            <option value=\"NY\">New York</option>\n            <option value=\"NC\">North Carolina</option>\n            <option value=\"ND\">North Dakota</option>\n            <option value=\"OH\">Ohio</option>\n            <option value=\"OK\">Oklahoma</option>\n            <option value=\"OR\">Oregon</option>\n            <option value=\"PA\">Pennsylvania</option>\n            <option value=\"RI\">Rhode Island</option>\n            <option value=\"SC\">South Carolina</option>\n            <option value=\"SD\">South Dakota</option>\n            <option value=\"TN\">Tennessee</option>\n            <option value=\"TX\">Texas</option>\n            <option value=\"UT\">Utah</option>\n            <option value=\"VT\">Vermont</option>\n            <option value=\"VA\">Virginia</option>\n            <option value=\"WA\">Washington</option>\n            <option value=\"WV\">West Virginia</option>\n            <option value=\"WI\">Wisconsin</option>\n            <option value=\"WY\">Wyoming</option>\n          </select>\n        </div>\n      </div>\n      <div class=\"row\">   \n        <div class=\"col-xs-12\"><a id=\"rep-search\" class=\"btn btn-default form-control\">Search</a></div>\n      </div>\n    </div>\n  </div>\n  <div id=\"results\" class=\"row\">";
  stack1 = helpers.each.call(depth0, depth0.data, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "    \n  </div>\n</div>";
  return buffer;
  });

this["alw"]["templates"]["home-carousel"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1, stack2;
  buffer += "\n  ";
  stack2 = helpers['if'].call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index), {hash:{},inverse:self.program(4, program4, data),fn:self.program(2, program2, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n  ";
  return buffer;
  }
function program2(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <li data-target=\"#home-carousel\" data-slide-to=\""
    + escapeExpression(((stack1 = ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\"></li>";
  return buffer;
  }

function program4(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <li data-target=\"#home-carousel\" data-slide-to=\""
    + escapeExpression(((stack1 = ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\" class=\"active\"></li>";
  return buffer;
  }

function program6(depth0,data) {
  
  var buffer = "", stack1, stack2;
  buffer += "\n  ";
  stack2 = helpers['if'].call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index), {hash:{},inverse:self.program(9, program9, data),fn:self.program(7, program7, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n  ";
  return buffer;
  }
function program7(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <div class=\"item\">\n    <div style=\"background:url('resources/images/";
  if (stack1 = helpers.image) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.image; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "'); background-size: 100%; background-position: center center;\" data-href=\"/products/product/";
  if (stack1 = helpers.product_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.product_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"image\"></div>\n    <div class=\"carousel-caption\">";
  if (stack1 = helpers.job_location) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_location; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</div>\n  </div>";
  return buffer;
  }

function program9(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <div class=\"item active\">\n    <div style=\"background:url('resources/images/";
  if (stack1 = helpers.image) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.image; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "'); background-size: 100%; background-position: center center;\" data-href=\"/products/product/";
  if (stack1 = helpers.product_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.product_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"image\"></div>\n    <div class=\"carousel-caption\">";
  if (stack1 = helpers.job_location) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_location; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</div>\n  </div>";
  return buffer;
  }

  buffer += "\n<ol class=\"carousel-indicators\">\n  ";
  stack1 = helpers.each.call(depth0, depth0.data, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</ol>\n<div class=\"carousel-inner\">\n  ";
  stack1 = helpers.each.call(depth0, depth0.data, {hash:{},inverse:self.noop,fn:self.program(6, program6, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</div><a href=\"#home-carousel\" data-slide=\"prev\" class=\"left carousel-control\"><span class=\"icon-prev\"></span></a><a href=\"#home-carousel\" data-slide=\"next\" class=\"right carousel-control\"><span class=\"icon-next\"></span></a>";
  return buffer;
  });

this["alw"]["templates"]["home"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "\n<div id=\"home-carousel\" class=\"carousel slide\"></div>";
  });

this["alw"]["templates"]["orderstatus"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n    <div class=\"row\">\n      <div class=\"col-xs-12\"> \n        <h2>";
  if (stack1 = helpers.job_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</h2>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>info: ";
  if (stack1 = helpers.job_info) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_info; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>id: ";
  if (stack1 = helpers.job_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>po: ";
  if (stack1 = helpers.job_po) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_po; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>rep: ";
  if (stack1 = helpers.job_rep) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_rep; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>so: ";
  if (stack1 = helpers.job_so) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_so; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>carrier: ";
  if (stack1 = helpers.job_carrier) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_carrier; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>start: ";
  if (stack1 = helpers.job_start_date) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_start_date; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-xs-12\">\n        <p>end: ";
  if (stack1 = helpers.job_end_date) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.job_end_date; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      </div>\n    </div>\n    <hr/>";
  return buffer;
  }

  buffer += "\n<div id=\"order_status\" class=\"content\">\n  <div class=\"row\">\n    <div id=\"status-search-form\" class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-12\">\n          <h2>Order Status Lookup</h2>\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-xs-12\">\n          <input id=\"status-search\" type=\"text\" class=\"form-control\"/>\n        </div>\n      </div>\n      <div class=\"row\">   \n        <div class=\"col-xs-12\"><a id=\"status-search-btn\" class=\"btn btn-default\">Search</a></div>\n      </div>\n    </div>\n  </div>\n  <div id=\"results\">";
  stack1 = helpers.each.call(depth0, depth0.data, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n  </div>\n</div>";
  return buffer;
  });

this["alw"]["templates"]["pricingcalc"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "\n<div id=\"pricing-calc\">\n  <h1>Pricing Calculator</h1>\n  <select id=\"pricing-select\" class=\"form-control\">\n    <option value=\"PRICING_CALCULATORS/LPONE2013_313/LPONE2013_313.htm\">Lightplane One (Recessed/Suspended/Wall(LP1/LP ONE)</option>\n    <option value=\"PRICING_CALCULATORS/LINEAR_LIGHTPLANE_CALCULATOR 2012.htm\">Lightplane Linear 2\" Suspended/Wall/Ceiling (LPL/WLP)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_LINEAR_3_5INS_SURFACE__2012/LIGHTPLANE_LINEAR_3_5INS_SURFACE__2012.htm\">Lightplane Linear 3.5\" Suspended/Wall/Ceiling(LPL3.5/WPL3.5)</option>\n    <option value=\"PRICING_CALCULATORS/LINEAR_LIGHTPLANE_6INS_CALCULATOR_2012.htm\">Lightplane Linear 6\" SERIES(LPL6)</option>\n    <option value=\"PRICING_CALCULATORS/TRIPLANE_CALCULATOR_2013/TRIPLANE_CALCULATOR_2013.htm\">Triplane (TRP)</option>\n    <option value=\"PRICING_CALCULATORS/HBEAM2013v1/HBEAM2013v1.htm\">H Beam(HBS/HBW)</option>\n    <option value=\"PRICING_CALCULATORS/HBEAM3.5_2013v2/HBEAM3.5 2013v2.htm\">H Beam 3.5inch (HB3.5S/HB3.5W)</option>\n    <option value=\"PRICING_CALCULATORS/LPLUUv1/LPLUUv1.htm\">Lightplane Up and Under (LPLUU)</option>\n    <option value=\"PRICING_CALCULATORS/WALL_GRAZER_CALCULATOR_2010.htm\">Lightplane Wall Grazer (LPWG)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_ROUND_SUSP_CALCULATOR_2010.htm\">Lightplane Round - Suspended (LPR)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_ROUND_WALL_CALCULATOR_2010.htm\">Lightplane Round - Wall (LPR)</option>\n    <option value=\"PRICING_CALCULATORS/LINEAR_LADDER_CALCULATOR_2012.htm\">Ladder (LDC/LDW)</option>\n    <option value=\"PRICING_CALCULATORS/FIVEBOW_CALCULATOR_2010.htm\">Five/Eight Bow (FB)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTBAR_CALCULATOR_2012.htm\">LP Lightbar (LPLB)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_9_CALCULATOR_2013/LIGHTPLANE_9_CALCULATOR_2013.htm\">Lightplane 9 (LP9)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_9_HYWIRE_CALCULATOR_2010.htm\">Lightplane 9 - Hywire(LP9-HY))</option>\n    <option value=\"PRICING_CALCULATORS/LP11_CALCULATOR_2012/LP11_CALCULATOR_2012.htm\">Lightplane 11 (LP11)</option>\n    <option value=\"PRICING_CALCULATORS/LP15_CALCULATOR_2010.htm\">Lightplane 15 (LP15)</option>\n    <option value=\"PRICING_CALCULATORS/LPCPcalc.htm\">Ceiling Panel System (LPCS)</option>\n    <option value=\"PRICING_CALCULATORS/CAS_FIXTURE_CALCULATOR_2009.htm\">CAS (CAS)</option>\n    <option value=\"PRICING_CALCULATORS/LP_MONOPOINTS_2010.htm\">LP Mono (LPM)</option>\n    <option value=\"PRICING_CALCULATORS/COMMALITE_CALCULATOR_2012.htm\">Commalite (CML)</option>\n    <option value=\"PRICING_CALCULATORS/CP_SYSTEM_CALCULATOR_2010.htm\">CP PENDANT/CEILING System</option>\n    <option value=\"PRICING_CALCULATORS/WSCP_SYSTEM_CALCULATOR_2010.htm\">CP WALL System (WSCP)</option>\n    <option value=\"PRICING_CALCULATORS/KELLY_CALCULATOR_2012.htm\">Kelly Pendants (KP)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_11_RECESSED_2010.htm\">Lightplane 11 Recessed (LPR11)</option>\n    <option value=\"PRICING_CALCULATORS/LUCERNA_ROUND_REFLECTOR_2009_CALCULATOR.htm\">Lucerna (LUC)</option>\n    <option value=\"PRICING_CALCULATORS/LPONE2013_313.htm\">Lightplane One(Recessed/Suspended/Wall(LP1/LP ONE)</option>\n    <option value=\"PRICING_CALCULATORS/LINEAR_LIGHTPLANE_RECESSED_2INS_CALCULATOR_2012.htm\">Lightplane Linear Recessed 2\" Profile(LPLR)</option>\n    <option value=\"PRICING_CALCULATORS/RCSMini_files/RCSMini.htm\">RCS Mini (RCS-Mini)</option>\n    <option value=\"PRICING_CALCULATORS/LYTESPOTfinalv4wMP/LYTESPOTfinalv4wMP.htm\">Recessed Lytespot (RCS)</option>\n    <option value=\"PRICING_CALCULATORS/LPLR3.5_Calculator_4-13/LPLR3.5_Calculator_4-13.htm\">Lightplane Linear Recessed 3.5\" Profile (LPLR3.5\")</option>\n    <option value=\"PRICING_CALCULATORS/LPLR5_2013-bugfix/LPLR5_2013-bugfix.htm\">Lightplane Linear Recessed 5\" Profile (LPLR5)</option>\n    <option value=\"PRICING_CALCULATORS/LINEAR_LIGHTPLANE_RECESSED_6INS_CALCULATOR_2010.htm\">Lightplane Linear Recessed 6\" Profile (LPLR6T/LPLR6/LPLR6RL)</option>\n    <option value=\"PRICING_CALCULATORS/LIGHTPLANE_LINEAR_WALLWASH_CALCULATOR_2012.htm\">Lightplane Linear Wall Wash (LPLWWT)</option>\n    <option value=\"2009_Pricing_Calculators/PLATES_CALCULATOR_2009.htm\">Plates(PL)</option>\n    <option value=\"PRICING_CALCULATORS/SIMPLEfORM_ESTIMATOR.htm\">SimpleForm (SF)</option>\n    <option value=\"PRICING_CALCULATORS/REGENCY-GROOVE_CALCULATOR_2009.htm\">Regency and Groove (REG/ GRV)</option>\n  </select>\n  <input type=\"button\" onclick=\"goOut();\" value=\"Go\"/>\n</div>";
  });

this["alw"]["templates"]["product"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "\n<div id=\"product\">\n  <div id=\"product-carousel\" class=\"carousel slide\"></div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <h1>";
  if (stack1 = helpers.p_name_ex) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_name_ex; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</h1>\n      <p>";
  if (stack1 = helpers.p_desc) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_desc; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "</p>\n      <p style=\"text-align: center\"><a href=\"http://www.archltgworks.com/source/files/main_files/";
  if (stack1 = helpers.p_download) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_download; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" target=\"_BLANK\" class=\"btn btn-default\">Download Spec Sheet</a></p>\n      <p style=\"text-align: center\"><a href=\"http://www.archltgworks.com/source/files/main_files/";
  if (stack1 = helpers.p_install) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_install; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" target=\"_BLANK\" class=\"btn btn-default\">Installation Instructions</a></p>\n    </div>\n  </div>\n</div>";
  return buffer;
  });

this["alw"]["templates"]["productcarousel"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1, stack2;
  buffer += "\n  ";
  stack2 = helpers['if'].call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index), {hash:{},inverse:self.program(4, program4, data),fn:self.program(2, program2, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n  ";
  return buffer;
  }
function program2(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <li data-target=\"#product-carousel\" data-slide-to=\""
    + escapeExpression(((stack1 = ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\"></li>";
  return buffer;
  }

function program4(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <li data-target=\"#product-carousel\" data-slide-to=\""
    + escapeExpression(((stack1 = ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\" class=\"active\"></li>";
  return buffer;
  }

function program6(depth0,data) {
  
  var buffer = "", stack1, stack2;
  buffer += "\n  ";
  stack2 = helpers['if'].call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.index), {hash:{},inverse:self.program(9, program9, data),fn:self.program(7, program7, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n  ";
  return buffer;
  }
function program7(depth0,data) {
  
  var buffer = "";
  buffer += "\n  <div class=\"item\">\n    <div style=\"background:url('http://www.archltgworks.com/source/images/site_images/"
    + escapeExpression((typeof depth0 === functionType ? depth0.apply(depth0) : depth0))
    + "'); background-size: cover; background-position: center center;\" class=\"image\"></div>\n  </div>";
  return buffer;
  }

function program9(depth0,data) {
  
  var buffer = "";
  buffer += "\n  <div class=\"item active\">\n    <div style=\"background:url('http://www.archltgworks.com/source/images/site_images/"
    + escapeExpression((typeof depth0 === functionType ? depth0.apply(depth0) : depth0))
    + "'); background-size: cover; background-position: center center;\" class=\"image\"></div>\n  </div>";
  return buffer;
  }

  buffer += "\n<ol class=\"carousel-indicators\">\n  ";
  stack1 = helpers.each.call(depth0, depth0.images, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</ol>\n<div class=\"carousel-inner\">\n  ";
  stack1 = helpers.each.call(depth0, depth0.images, {hash:{},inverse:self.noop,fn:self.program(6, program6, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</div><a href=\"#product-carousel\" data-slide=\"prev\" class=\"left carousel-control\"><span class=\"icon-prev\"></span></a><a href=\"#product-carousel\" data-slide=\"next\" class=\"right carousel-control\"><span class=\"icon-next\"></span></a>";
  return buffer;
  });

this["alw"]["templates"]["products"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <div style=\"background:url('http://www.archltgworks.com/source/images/cats/";
  if (stack1 = helpers.pc_image) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.pc_image; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "');\" data-cat=\"";
  if (stack1 = helpers.pc_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.pc_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"product-category\">\n    <div class=\"product-caption\">\n      <h4>";
  if (stack1 = helpers.pc_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.pc_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</h4>\n    </div>\n  </div>";
  return buffer;
  }

  buffer += "\n<div id=\"all-products\" class=\"row\">";
  stack1 = helpers.each.call(depth0, depth0.data, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</div>";
  return buffer;
  });

this["alw"]["templates"]["productsByCat"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <div style=\"background:url('http://www.archltgworks.com/source/images/site_images/preview/";
  if (stack1 = helpers.p_image1) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_image1; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "'); background-size: 100%;\" data-id=\"";
  if (stack1 = helpers.products_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.products_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"product\">\n    <div class=\"product-caption\">\n      <h4>";
  if (stack1 = helpers.p_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</h4>\n    </div>\n  </div>";
  return buffer;
  }

  buffer += "\n<div id=\"all-products\" class=\"row\">";
  stack1 = helpers.each.call(depth0, depth0.objects, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</div>";
  return buffer;
  });

this["alw"]["templates"]["quickship"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "\n<div id=\"quickship\" class=\"content\">\n  <div id=\"header\">\n    <div id=\"banner\"></div>\n  </div>\n  <div class=\"row\">\n    <div style=\"text-align: center; margin-top: 20px; margin-bottom: 20px;\" class=\"col-xs-12\"><span id=\"view-quickship\" class=\"btn btn-danger\">View Quick Ship Products</span></div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_03.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>In Stock &amp; Ready To Ship</h2>\n          <p>Pre-assembled, and ready to install.</p>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_07.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>5-7 Day Turn Around</h2>\n          <p>Keep projects on time and running smoothly.</p>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_09.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>Canada Ready</h2>\n          <p>Complete with Canadian quick connect hardware</p>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_11.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>Plug &amp; Play</h2>\n          <p>Simple &quot;plug-and-play&quot; technology.</p>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_13.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>Assembly</h2>\n          <p>Units can be individual</p>( stand-alone ), or easily connected for continuous row mounting in field.\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_15.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>Tools</h2>\n          <p>All installation hardware included: lens removal tool, phillips screwdriver, joiner hardware.</p>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-xs-12\">\n      <div class=\"row\">\n        <div class=\"col-xs-4\"><img src=\"resources/images/qs_17.png\"/></div>\n        <div class=\"col-xs-8\">\n          <h2>Design</h2>\n          <ul>\n            <li>Durable powder coat paint finish.</li>\n            <li>High performance reflectors for maximum light output and minimal lamp outage.</li>\n            <li>Satin white opal diffusers.</li>\n          </ul>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>";
  });

this["alw"]["templates"]["quickshipProducts"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n  <div style=\"background:url('http://archltgworks.com/source/images/site_images/preview/";
  if (stack1 = helpers.p_image1) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_image1; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "'); background-size: cover;\" data-id=\"";
  if (stack1 = helpers.products_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.products_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"product-category\">\n    <div class=\"product-caption\">\n      <h4>";
  if (stack1 = helpers.p_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.p_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</h4>\n    </div>\n  </div>";
  return buffer;
  }

  buffer += "\n<div id=\"all-products\" class=\"row\">";
  stack1 = helpers.each.call(depth0, depth0.data, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</div>";
  return buffer;
  });

this["alw"]["templates"]["replogin"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "\n<div id=\"replogin\">\n  <form class=\"form-signin\">\n    <h2 class=\"form-signin-heading\">Please sign in\n      <input type=\"text\" placeholder=\"Email address\" autofocus=\"autofocus\" class=\"form-control username\"/>\n      <input type=\"password\" placeholder=\"Password\" class=\"form-control password\"/>\n      <button id=\"signin\" type=\"button\" class=\"btn btn-lg btn-primary btn-block\">Sign in</button>\n    </h2>\n  </form>\n</div>";
  });

this["alw"]["templates"]["sidenav-auth"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<span class=\"block\"><span>";
  if (stack1 = helpers.user) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.user; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</span></span><span data-href=\"products\">Products</span><span data-href=\"quickship\">QuickShip</span><span data-href=\"find\">Find a Rep</span><span data-href=\"events\">Events</span><span data-href=\"contact\">Contact Us</span><span data-href=\"rep/status\">Order Status</span><span data-href=\"pricing\">Pricing</span><span data-href=\"led_info\">LED Information</span>";
  return buffer;
  });

this["alw"]["templates"]["sidenav"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<span data-href=\"rep/login\" class=\"block\">\n  <div data-href=\"rep/login\" class=\"btn-nav\">Rep Login</div></span><span data-href=\"products\">Products</span><span data-href=\"quickship\">QuickShip</span><span data-href=\"find\">Find a Rep</span><span data-href=\"events\">Events</span><span data-href=\"contact\">Contact Us</span>";
  });