let t;
window.app = new Vue({
  el: "#app",
  data: {
    modalShow: false,
    formShow: false,
    dodajKategoria: "", //dodawana kategoria
    filter: "",
    items: t,
    form: {
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
    ],
  },

  methods: {
    rowClickHandler: function (record, index) {
      //zdarzenie kliknięcia w wiersz
      alert("wiersz:  " + JSON.stringify(record) + "\nindex:" + index); // This will be the item data for the row
    },
    onSubmit(event) {
      event.preventDefault();
      const params = new URLSearchParams();
      params.append("name", this.form.name);
      params.append("lastName", this.form.lastName);
      params.append("age", this.form.age);
      params.append("active", this.form.checked[0]);
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
