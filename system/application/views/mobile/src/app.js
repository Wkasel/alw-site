window.alw = {
  collections: {},
  models: {},
  app: {
    url: function(endpoint) {
      return 'http://www.archltgworks.com/api/' + endpoint;
    }
  },
  ui: {},
  routers: {},
  events: {},
  init: function() {
    this.ui.app = new this.ui.App();
    this.events = new AppEvents();
    this.routers.main = new this.routers.Main();
    Backbone.history.start({
      pushState: false
    });
    return true;
  }
};

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  window.AppEvents = (function() {
    function AppEvents() {}

    _(AppEvents.prototype).extend(Backbone.Events);

    return AppEvents;

  })();
  return alw.routers.Main = (function(_super) {
    __extends(Main, _super);

    function Main() {
      _ref = Main.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Main.prototype.routes = {
      "": "index",
      "#": "index",
      'products': 'products',
      'products/cat/:name': 'productCat',
      'products/product/:id': 'loadProduct',
      'quickship': 'quickship',
      'quickship/products': 'quickshipProducts',
      'find': 'find',
      'events': 'events',
      'contact': 'contact',
      "rep/login": 'repLogin',
      "rep/status": 'repStatus',
      "rep/pricing_calc": 'pricingCalc'
    };

    Main.prototype.index = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.home = new alw.ui.Home;
    };

    Main.prototype.products = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.products = new alw.ui.Products;
    };

    Main.prototype.productCat = function(name) {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.productsByCat = new alw.ui.ProductsByCat({
        category: name
      });
    };

    Main.prototype.loadProduct = function(id) {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.product = new alw.ui.Product({
        id: id
      });
    };

    Main.prototype.quickship = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.quickship = new alw.ui.QuickShip;
    };

    Main.prototype.quickshipProducts = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.quickshipProducts = new alw.ui.QuickShipProducts;
    };

    Main.prototype.find = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.find = new alw.ui.Find;
    };

    Main.prototype.events = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.events = new alw.ui.Events;
    };

    Main.prototype.contact = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.contact = new alw.ui.Contact;
    };

    Main.prototype.repLogin = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.repLogin = new alw.ui.RepLogin;
    };

    Main.prototype.repStatus = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.orderstatus = new alw.ui.OrderStatus;
    };

    Main.prototype.pricingCalc = function() {
      alw.ui.app.sidetap.close_nav();
      return alw.ui.pricing = new alw.ui.PricingCalc;
    };

    return Main;

  })(Backbone.Router);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref, _ref1, _ref10, _ref11, _ref12, _ref13, _ref14, _ref15, _ref2, _ref3, _ref4, _ref5, _ref6, _ref7, _ref8, _ref9;
  alw.models.Product = (function(_super) {
    __extends(Product, _super);

    function Product() {
      _ref = Product.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    return Product;

  })(Backbone.Model);
  alw.collections.ProductDetailed = (function(_super) {
    __extends(ProductDetailed, _super);

    function ProductDetailed() {
      _ref1 = ProductDetailed.__super__.constructor.apply(this, arguments);
      return _ref1;
    }

    ProductDetailed.prototype.model = alw.models.Product;

    ProductDetailed.prototype.initialize = function(id) {
      return this.url = 'http://www.archltgworks.com/api/product/' + id.id;
    };

    return ProductDetailed;

  })(Backbone.Model);
  alw.collections.Products = (function(_super) {
    __extends(Products, _super);

    function Products() {
      _ref2 = Products.__super__.constructor.apply(this, arguments);
      return _ref2;
    }

    Products.prototype.url = 'http://www.archltgworks.com/api/products';

    Products.prototype.model = alw.models.Product;

    return Products;

  })(Backbone.Model);
  alw.collections.ProductsByCat = (function(_super) {
    __extends(ProductsByCat, _super);

    function ProductsByCat() {
      _ref3 = ProductsByCat.__super__.constructor.apply(this, arguments);
      return _ref3;
    }

    ProductsByCat.prototype.model = alw.models.Product;

    ProductsByCat.prototype.initialize = function(cat) {
      console.log(cat);
      return this.url = 'http://www.archltgworks.com/api/cat/' + cat.category;
    };

    return ProductsByCat;

  })(Backbone.Model);
  alw.models.Hightlight = (function(_super) {
    __extends(Hightlight, _super);

    function Hightlight() {
      _ref4 = Hightlight.__super__.constructor.apply(this, arguments);
      return _ref4;
    }

    return Hightlight;

  })(Backbone.Model);
  alw.collections.Highlights = (function(_super) {
    __extends(Highlights, _super);

    function Highlights() {
      _ref5 = Highlights.__super__.constructor.apply(this, arguments);
      return _ref5;
    }

    Highlights.prototype.url = 'http://www.archltgworks.com/api/mobile_home';

    Highlights.prototype.model = alw.models.Hightlight;

    return Highlights;

  })(Backbone.Collection);
  alw.collections.QuickShip = (function(_super) {
    __extends(QuickShip, _super);

    function QuickShip() {
      _ref6 = QuickShip.__super__.constructor.apply(this, arguments);
      return _ref6;
    }

    QuickShip.prototype.url = 'http://www.archltgworks.com/api/quickship';

    QuickShip.prototype.model = alw.models.Product;

    return QuickShip;

  })(Backbone.Collection);
  alw.models.Event = (function(_super) {
    __extends(Event, _super);

    function Event() {
      _ref7 = Event.__super__.constructor.apply(this, arguments);
      return _ref7;
    }

    return Event;

  })(Backbone.Model);
  alw.collections.Events = (function(_super) {
    __extends(Events, _super);

    function Events() {
      _ref8 = Events.__super__.constructor.apply(this, arguments);
      return _ref8;
    }

    Events.prototype.url = 'http://www.archltgworks.com/api/events';

    Events.prototype.model = alw.models.Event;

    return Events;

  })(Backbone.Collection);
  alw.models.Contact = (function(_super) {
    __extends(Contact, _super);

    function Contact() {
      _ref9 = Contact.__super__.constructor.apply(this, arguments);
      return _ref9;
    }

    return Contact;

  })(Backbone.Model);
  alw.collections.Contacts = (function(_super) {
    __extends(Contacts, _super);

    function Contacts() {
      _ref10 = Contacts.__super__.constructor.apply(this, arguments);
      return _ref10;
    }

    Contacts.prototype.url = 'http://www.archltgworks.com/api/contact';

    Contacts.prototype.model = alw.models.Contact;

    return Contacts;

  })(Backbone.Collection);
  alw.models.Rep = (function(_super) {
    __extends(Rep, _super);

    function Rep() {
      _ref11 = Rep.__super__.constructor.apply(this, arguments);
      return _ref11;
    }

    return Rep;

  })(Backbone.Model);
  alw.collections.Reps = (function(_super) {
    __extends(Reps, _super);

    function Reps() {
      _ref12 = Reps.__super__.constructor.apply(this, arguments);
      return _ref12;
    }

    Reps.prototype.model = alw.models.Rep;

    Reps.prototype.initialize = function(query) {
      return this.url = 'http://www.archltgworks.com/api/find_rep?country=' + query.country + '&state=' + query.state;
    };

    return Reps;

  })(Backbone.Model);
  alw.models.Auth = (function(_super) {
    __extends(Auth, _super);

    function Auth() {
      _ref13 = Auth.__super__.constructor.apply(this, arguments);
      return _ref13;
    }

    Auth.prototype.defaults = {
      user: '',
      pass: '',
      token: ''
    };

    Auth.prototype.url = 'http://www.archltgworks.com/api/auth';

    return Auth;

  })(Backbone.Model);
  alw.models.Status = (function(_super) {
    __extends(Status, _super);

    function Status() {
      _ref14 = Status.__super__.constructor.apply(this, arguments);
      return _ref14;
    }

    Status.prototype.defaults = {
      search: '',
      cond: 'or',
      from: 'Date from',
      to: 'Date to'
    };

    return Status;

  })(Backbone.Model);
  return alw.collections.Status = (function(_super) {
    __extends(Status, _super);

    function Status() {
      _ref15 = Status.__super__.constructor.apply(this, arguments);
      return _ref15;
    }

    Status.prototype.model = alw.models.Status;

    Status.prototype.initialize = function(query) {
      return this.url = 'http://www.archltgworks.com/api/order_status?search=' + encodeURIComponent(query) + '&cond=or&from=Date%20from&to=Date%20to&token=' + encodeURIComponent(alw.models.user.get('token'));
    };

    return Status;

  })(Backbone.Collection);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.HomeCarousel = (function(_super) {
    __extends(HomeCarousel, _super);

    function HomeCarousel() {
      _ref = HomeCarousel.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    HomeCarousel.prototype.el = '#home-carousel';

    HomeCarousel.prototype.template = alw.templates['home-carousel'];

    HomeCarousel.prototype.events = {
      'swipeleft': 'navCarousel',
      'swiperight': 'navCarousel',
      'click': 'viewproduct'
    };

    HomeCarousel.prototype.render = function() {
      $(this.el).html(this.template({
        data: this.collection.toJSON()
      }));
      $(this.el).hammer({
        prevent_mouseevents: false
      });
      $(this.el).carousel({
        interval: 5000
      });
      $(window).on('resize', this.resize);
      return this.resize();
    };

    HomeCarousel.prototype.initialize = function() {
      this.collection = new alw.collections.Highlights;
      this.collection.bind("add", _.bind(this.render, this));
      return this.collection.fetch();
    };

    HomeCarousel.prototype.navCarousel = function(e) {
      if (e.gesture.direction === 'left') {
        return $('#home-carousel').carousel('next');
      } else {
        return $('#home-carousel').carousel('prev');
      }
    };

    HomeCarousel.prototype.resize = function() {
      return $('.carousel-inner >.item > .image').height($(window).height() - $('header').height() - 80);
    };

    HomeCarousel.prototype.remove = function() {
      return $(window).off('resize', this.resize);
    };

    HomeCarousel.prototype.viewproduct = function(e) {
      var _el, _el2;
      _el = $(e.currentTarget).attr('id');
      _el2 = $(e.target);
      return alw.routers.main.navigate($('#' + _el + ' .image').data('href'), {
        trigger: true
      });
    };

    return HomeCarousel;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.ProductCarousel = (function(_super) {
    __extends(ProductCarousel, _super);

    function ProductCarousel() {
      _ref = ProductCarousel.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    ProductCarousel.prototype.el = '#product-carousel';

    ProductCarousel.prototype.template = alw.templates['productcarousel'];

    ProductCarousel.prototype.events = {
      'swipeleft': 'navCarousel',
      'swiperight': 'navCarousel'
    };

    ProductCarousel.prototype.render = function(data) {
      $(this.el).html(this.template(data));
      return $(this.el).hammer({
        prevent_mouseevents: false
      });
    };

    ProductCarousel.prototype.navCarousel = function(e) {
      console.log('swiped', e);
      if (e.gesture.direction === 'left') {
        return $('#product-carousel').carousel('next');
      } else {
        return $('#product-carousel').carousel('prev');
      }
    };

    ProductCarousel.prototype.initialize = function(data) {
      return this.render(data);
    };

    return ProductCarousel;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.RepLogin = (function(_super) {
    __extends(RepLogin, _super);

    function RepLogin() {
      _ref = RepLogin.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    RepLogin.prototype.el = '#page-content';

    RepLogin.prototype.template = alw.templates['replogin'];

    RepLogin.prototype.events = {
      'click #signin': 'auth'
    };

    RepLogin.prototype.render = function() {
      return $(this.el).html(this.template());
    };

    RepLogin.prototype.initialize = function() {
      return this.render();
    };

    RepLogin.prototype.auth = function() {
      var pass, user, _this;
      _this = this;
      user = $('#replogin .username').val();
      pass = $('#replogin .password').val();
      Backbone.emulateJSON = true;
      alw.models.user = this.model = new alw.models.Auth({
        user: user,
        pass: pass
      });
      return this.model.sync('create', this.model, {
        success: function(model, data, opts) {
          _this.model.set('token', model.token);
          Backbone.emulateJSON = false;
          alw.ui.app.nav.authRender({
            user: _this.model.get('user')
          });
          alw.routers.main.navigate('', {
            trigger: true
          });
          return alw.ui.app.sidetap.open_nav();
        },
        error: function(model, data) {
          return alert('Error, incorrect information.');
        }
      });
    };

    return RepLogin;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.App = (function(_super) {
    __extends(App, _super);

    function App() {
      _ref = App.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    App.prototype.el = 'body';

    App.prototype.template = alw.templates['app'];

    App.prototype.events = {
      "click .menu": "slideNav",
      "slideleft header": "slideNav",
      "slideright header": "slideNav",
      "touch #logo": function() {
        return alw.routers.main.navigate('/', {
          trigger: true
        });
      }
    };

    App.prototype.render = function() {
      $(this.el).html(this.template());
      this.sidetap = new sidetap;
      this.nav = new alw.ui.SideNav;
      $(this.el).hammer({
        prevent_mouseevents: false
      });
      $('body').bind('touchmove', function(event) {
        return event.preventDefault();
      });
      $('body').unbind('touchmove');
      $(window).on('resize', this.resize);
      return this.resize();
    };

    App.prototype.initialize = function() {
      return this.render();
    };

    App.prototype.slideNav = function() {
      return this.sidetap.toggle_nav();
    };

    App.prototype.resize = function() {
      $('.scrollNav').css('height', $(window).height());
      return $('#nav-bottom').css('bottom', '0px');
    };

    return App;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.Contact = (function(_super) {
    __extends(Contact, _super);

    function Contact() {
      _ref = Contact.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Contact.prototype.el = '#page-content';

    Contact.prototype.template = alw.templates['contact'];

    Contact.prototype.render = function() {
      return $(this.el).html(this.template({
        data: this.collection.toJSON()[0]
      }));
    };

    Contact.prototype.initialize = function() {
      this.collection = new alw.collections.Contacts();
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    return Contact;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.Events = (function(_super) {
    __extends(Events, _super);

    function Events() {
      _ref = Events.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Events.prototype.el = '#page-content';

    Events.prototype.template = alw.templates['events'];

    Events.prototype.render = function() {
      var data;
      $(this.el).html(this.template());
      data = this.collection.toJSON()[0];
      return $('#event-calendar').html(data.event_calendar_content);
    };

    Events.prototype.initialize = function() {
      this.collection = new alw.collections.Events();
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    return Events;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.Find = (function(_super) {
    __extends(Find, _super);

    function Find() {
      _ref = Find.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Find.prototype.el = '#page-content';

    Find.prototype.template = alw.templates['find'];

    Find.prototype.events = {
      'click #rep-search': 'search'
    };

    Find.prototype.render = function() {
      if (this.collection) {
        return $(this.el).html(this.template({
          data: this.collection.toJSON()
        }));
      } else {
        return $(this.el).html(this.template({
          data: null
        }));
      }
    };

    Find.prototype.initialize = function() {
      return this.render();
    };

    Find.prototype.search = function() {
      var query;
      query = {
        state: $('#rep-state').val(),
        country: $('#rep-country').val()
      };
      this.collection = new alw.collections.Reps(query);
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    return Find;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.Home = (function(_super) {
    __extends(Home, _super);

    function Home() {
      _ref = Home.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Home.prototype.el = '#page-content';

    Home.prototype.template = alw.templates['home'];

    Home.prototype.render = function() {
      $(this.el).html(this.template());
      return this.carousel = new alw.ui.HomeCarousel;
    };

    Home.prototype.initialize = function() {
      return this.render();
    };

    return Home;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.OrderStatus = (function(_super) {
    __extends(OrderStatus, _super);

    function OrderStatus() {
      _ref = OrderStatus.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    OrderStatus.prototype.el = '#page-content';

    OrderStatus.prototype.template = alw.templates['orderstatus'];

    OrderStatus.prototype.events = {
      'click #status-search-btn': 'search'
    };

    OrderStatus.prototype.render = function() {
      console.log('find a rep - render');
      if (this.collection) {
        return $(this.el).html(this.template({
          data: this.collection.toJSON()
        }));
      } else {
        return $(this.el).html(this.template({
          data: null
        }));
      }
    };

    OrderStatus.prototype.initialize = function() {
      return this.render();
    };

    OrderStatus.prototype.search = function() {
      var search;
      search = $('#status-search').val();
      this.collection = new alw.collections.Status(search);
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    return OrderStatus;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.PricingCalc = (function(_super) {
    __extends(PricingCalc, _super);

    function PricingCalc() {
      _ref = PricingCalc.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    PricingCalc.prototype.el = '#page-content';

    PricingCalc.prototype.template = alw.templates['pricingcalc'];

    PricingCalc.prototype.events = {
      'change #pricing-select': 'navToPricingCalc'
    };

    PricingCalc.prototype.render = function() {
      return $(this.el).html(this.template());
    };

    PricingCalc.prototype.initialize = function() {
      return this.render();
    };

    PricingCalc.prototype.navToPricingCalc = function(e) {
      var _el;
      _el = $(e.currentTarget).attr('id');
      window.open('http://www.archltgworks.com/static/' + $('#' + _el).val(), 'Pricing Calculator');
      return new window.focus();
    };

    return PricingCalc;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.Product = (function(_super) {
    __extends(Product, _super);

    function Product() {
      _ref = Product.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Product.prototype.el = '#page-content';

    Product.prototype.template = alw.templates['product'];

    Product.prototype.render = function() {
      var data;
      data = this.collection.toJSON();
      $(this.el).html(this.template(data));
      return this.carousel = new alw.ui.ProductCarousel({
        images: data.images
      });
    };

    Product.prototype.navCarousel = function(e) {
      if (e.gesture.direction === 'left') {
        return $('#product-carousel').carousel('next');
      } else {
        return $('#product-carousel').carousel('prev');
      }
    };

    Product.prototype.initialize = function(id) {
      this.collection = new alw.collections.ProductDetailed(id);
      this.collection.bind('add', _.bind(this.render, this));
      this.collection.bind('change', _.bind(this.render, this));
      return this.collection.fetch();
    };

    return Product;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.Products = (function(_super) {
    __extends(Products, _super);

    function Products() {
      _ref = Products.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Products.prototype.el = '#page-content';

    Products.prototype.template = alw.templates['products'];

    Products.prototype.events = {
      "click .product-category": "loadCat"
    };

    Products.prototype.render = function() {
      return $(this.el).html(this.template({
        data: this.collection.toJSON()
      }));
    };

    Products.prototype.initialize = function() {
      this.collection = new alw.collections.Products;
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    Products.prototype.loadCat = function(e) {
      return alw.routers.main.navigate('products/cat/' + $(e.currentTarget).data('cat'), {
        trigger: true
      });
    };

    return Products;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.ProductsByCat = (function(_super) {
    __extends(ProductsByCat, _super);

    function ProductsByCat() {
      _ref = ProductsByCat.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    ProductsByCat.prototype.el = '#page-content';

    ProductsByCat.prototype.template = alw.templates['productsByCat'];

    ProductsByCat.prototype.events = {
      "click .product": "loadProduct"
    };

    ProductsByCat.prototype.render = function() {
      return $(this.el).html(this.template(this.collection.toJSON()));
    };

    ProductsByCat.prototype.initialize = function(cat) {
      var _this;
      _this = this;
      this.collection = new alw.collections.ProductsByCat(cat);
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    ProductsByCat.prototype.loadProduct = function(e) {
      console.log($(e.currentTarget).data('id'));
      return alw.routers.main.navigate('products/product/' + $(e.currentTarget).data('id'), {
        trigger: true
      });
    };

    return ProductsByCat;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.QuickShip = (function(_super) {
    __extends(QuickShip, _super);

    function QuickShip() {
      _ref = QuickShip.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    QuickShip.prototype.el = '#page-content';

    QuickShip.prototype.template = alw.templates['quickship'];

    QuickShip.prototype.events = {
      'click #view-quickship': 'navToQuickShip'
    };

    QuickShip.prototype.render = function(data) {
      return $(this.el).html(this.template({
        data: data
      }));
    };

    QuickShip.prototype.initialize = function(data) {
      return this.render(data);
    };

    QuickShip.prototype.navToQuickShip = function(e) {
      return alw.routers.main.navigate('quickship/products', {
        trigger: true
      });
    };

    return QuickShip;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.QuickShipProducts = (function(_super) {
    __extends(QuickShipProducts, _super);

    function QuickShipProducts() {
      _ref = QuickShipProducts.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    QuickShipProducts.prototype.el = '#page-content';

    QuickShipProducts.prototype.template = alw.templates['quickshipProducts'];

    QuickShipProducts.prototype.events = {
      'click #view-quickship': 'navToQuickShip',
      'click .product-category': 'loadProduct'
    };

    QuickShipProducts.prototype.render = function() {
      return $(this.el).html(this.template({
        data: this.collection.toJSON()
      }));
    };

    QuickShipProducts.prototype.initialize = function() {
      this.collection = new alw.collections.QuickShip;
      this.collection.bind("add", _.bind(this.render, this));
      this.collection.bind("change", _.bind(this.render, this));
      return this.collection.fetch();
    };

    QuickShipProducts.prototype.loadProduct = function(e) {
      console.log($(e.currentTarget).data('id'));
      return alw.routers.main.navigate('products/product/' + $(e.currentTarget).data('id'), {
        trigger: true
      });
    };

    return QuickShipProducts;

  })(Backbone.View);
});

var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

$(function() {
  var _ref;
  return alw.ui.SideNav = (function(_super) {
    __extends(SideNav, _super);

    function SideNav() {
      _ref = SideNav.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    SideNav.prototype.el = 'nav';

    SideNav.prototype.template = alw.templates['sidenav'];

    SideNav.prototype.authtemplate = alw.templates['sidenav-auth'];

    SideNav.prototype.events = {
      'click span': 'nav'
    };

    SideNav.prototype.render = function() {
      return $(this.el).html(this.template());
    };

    SideNav.prototype.authRender = function(data, callback) {
      return $(this.el).html(this.authtemplate(data));
    };

    SideNav.prototype.initialize = function() {
      return this.render();
    };

    SideNav.prototype.nav = function(e) {
      $('.selected').removeClass('selected');
      $(e.currentTarget).toggleClass('selected');
      return alw.routers.main.navigate($(e.currentTarget).data('href'), {
        trigger: true
      });
    };

    return SideNav;

  })(Backbone.View);
});

$(function() {
  return alw.init();
});
