var app = new Vue({
  el: '#app',
  data: {
    left: 0,
    right: 0,
    isComputedCalled: false
  },
  methods: {
    // この関数が呼び出されたタイミングがわかるように
    // メッセージを表示させる
    setMessage: function () {      
      // メッセージを表示
      this.isComputedCalled = true
      const that = this
      setTimeout(function () {
        that.isComputedCalled = false
      }, 1000) // 1秒後にメッセージが消えます
    }
  },
  computed: {
    total: function () {
      this.setMessage()

      return this.left + this.right
    }
  }
})
