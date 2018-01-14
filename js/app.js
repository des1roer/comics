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
          self.all = data[0];
          self.img = self.all.shift();
          self.loc = parseInt(data[1]);
          self.img = self.all[self.loc];
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
      c(this.loc)
      this.img = this.all[this.loc];
      $("html, body").animate({scrollTop: 0}, "slow");
      $.ajax({
        url: "php/data.php",
        type: 'POST',
        data: {act: 'set', data: this.loc},
        success: function (data) {
        
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    }
  }
})

window.addEventListener('keydown', function (e) {
  console.log(e.keyCode);
  if (e.keyCode == 39) {
    vm.next();
  } else if (e.keyCode == 37) { //left
    vm.prev();
  }
});