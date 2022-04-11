let t;
window.app = new Vue({
  el: "#app",
  data: {
    modalShow: false,
    formShow: false,
    formShow2: false,
    dodajKategoria: "", //dodawana kategoria
    filter: "",
    items: t,
    form: {
      id: "",
      name: "",
      lastName: "",
      age: "",
      checked: [],
    },
    show: true,
    fields: [
      {
        key: "isActive", //kolumna z JSON
        sortable: false, //czy włączyć sortowanie dla tej kolumny
        label: "Aktywny", //Nagłówek tabeli
      },
      {
        key: "age",
        sortable: true,
        label: "Wiek",
      },
      {
        key: "first_name",
        sortable: true,
        label: "Imię",
      },
      {
        key: "last_name",
        sortable: true,
        label: "Nazwisko",
      },
      {
        key: "id",
        sortable: true,
        label: "ID",
      },
    ],
  },

  methods: {
    rowClickHandler: function (record, index) {
      //zdarzenie kliknięcia w wiersz
      alert("wiersz:  " + JSON.stringify(record) + "\nindex:" + index); // This will be the item data for the row
      this.form.id = record.id;
      this.form.name = record.first_name;
      this.form.lastName = record.last_name;
      this.form.age = record.age;
      if(record.isActive === "true")
      {
        this.form.checked = ["Active"];
      }
      else
      {
        this.form.checked = [];
      }
      this.modalShow = false;
      this.formShow2 = true;
    },
    onSubmit(event) {
      event.preventDefault();
      if(this.form.checked.length === 0)
      {
        axios.get("./s.php?name=" + this.form.name + "&lastName=" + this.form.lastName + "&age=" + this.form.age)
        .then(function (response) {
          console.log("success");
        });
      }
      else{
        axios.get("./s.php?name=" + this.form.name + "&lastName=" + this.form.lastName + "&age=" + this.form.age + "&active=" + this.form.checked[0])
        .then(function (response) {
          console.log("success");
        });
      }
    },
    onSubmit2(event) {
      event.preventDefault();
      if(this.form.checked.length === 0)
      {
        axios.get("./m.php?name=" + this.form.name + "&lastName=" + this.form.lastName + "&age=" + this.form.age + "&id=" + this.form.id)
        .then(function (response) {
          console.log("success");
        });
      }
      else{
        axios.get("./m.php?name=" + this.form.name + "&lastName=" + this.form.lastName + "&age=" + this.form.age + "&id=" + this.form.id + "&active=" + this.form.checked[0])
        .then(function (response) {
          console.log("success");
        });
      }
    },
    onDelete(event) {
      event.preventDefault();
      axios.get("./u.php?id="+ this.form.id)
      .then(function (response) {
        console.log("success2");
      });
    },
    onReset(event) {
      event.preventDefault();
      // Reset our form valuesa
      this.form.name = "";
      this.form.lastName = "";
      this.form.age = "";
      this.form.checked = [];
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
    async download(event) {
      this.modalShow = !this.modalShow;
      const response = await axios.get("./n.php");
      this.items = response.data;
    }
  },
  async created() {
    const response = await axios.get("./n.php");
    this.items = response.data;
  },
});
