c = function () {
  return console.log.apply(console, arguments);
};

var vm = new Vue({
  el: '.wrapper',
  data: {
    loader: false,
    img: null,
    all: [],
    loc: 0,
  },
  mounted: function () {
    this.refresh();
  },
  methods: {
    refresh: function () {
      var self = this;
      
      $.ajax({
        url: "php/data.php",
        type: 'POST',
        data: {act: 'list'},
        success: function (data) {
          if (data == [])
            return false;
          var data = JSON.parse(data);
          self.img = data.shift();
          self.all = data;
          var frame = document.getElementById("ifr");
          frame.height = window.innerHeight;
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    },
    prev: function () {
      this.change_slide(false)
    },
    next: function () {
      this.change_slide()
    },
    change_slide: function (plus = true) {
      if (plus) {
        if (this.loc == this.all.length - 1) {
          alert('The End');
        } else {
          this.loc += 1;
        }
      } else if (this.loc > 0) {
        this.loc -= 1;
      }
      this.img = this.all[this.loc];
      $("html, body").animate({scrollTop: 0}, "slow");
    }
  }
})