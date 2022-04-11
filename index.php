<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Tabela z filtrem i sortowaniem</title>
  <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
  <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@2.21.0/dist/bootstrap-vue.css" />
  <script src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script>
  <script src="https://unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
  <!-- Bootstrap działa standardowo z jQuery, ta wersja biblioteki integruje BS z VUE: -->
  <script src="https://unpkg.com/bootstrap-vue@2.21.0/dist/bootstrap-vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
  <div id="app">
    <b-button @click="download">Otwórz Tabele</b-button>
    <b-button @click="formShow = !formShow">Nowe dane</b-button>
    <b-modal v-model="formShow">
      <div>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
          <b-form-group id="input-group-1" label="Twoje imie:" label-for="input-1">
            <b-form-input id="input-1" v-model="form.name" placeholder="Imie" required></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-2" label="Twoje nazwisko:" label-for="input-2">
            <b-form-input id="input-2" v-model="form.lastName" placeholder="Nazwisko" required></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Twój wiek:" label-for="input-3">
            <b-form-input id="input-3" v-model="form.age" type="number" placeholder="Wiek" required></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-4" v-slot="{ ariaDescribedby }">
            <b-form-checkbox-group v-model="form.checked" id="checkboxes-4" :aria-describedby="ariaDescribedby">
              <b-form-checkbox value="Active">Aktywny</b-form-checkbox>
            </b-form-checkbox-group>
          </b-form-group>

          <b-button type="submit" variant="primary">Submit</b-button>
          <b-button type="reset" variant="danger">Reset</b-button>
        </b-form>
        <b-card class="mt-3" header="Form Data Result">
          <pre class="m-0">{{ form }}</pre>
        </b-card>
      </div>
    </b-modal>
    <b-modal v-model="formShow2">
      <div>
        <b-form @submit="onSubmit2" @reset="onDelete" v-if="show">
          <b-form-group id="input-group-1" label="Twoje imie:" label-for="input-1">
            <b-form-input id="input-1" v-model="form.name" placeholder="Imie" required></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-2" label="Twoje nazwisko:" label-for="input-2">
            <b-form-input id="input-2" v-model="form.lastName" placeholder="Nazwisko" required></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Twój wiek:" label-for="input-3">
            <b-form-input id="input-3" v-model="form.age" type="number" placeholder="Wiek" required></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-4" v-slot="{ ariaDescribedby }">
            <b-form-checkbox-group v-model="form.checked" id="checkboxes-4" :aria-describedby="ariaDescribedby">
              <b-form-checkbox value="Active">Aktywny</b-form-checkbox>
            </b-form-checkbox-group>
          </b-form-group>

          <b-button type="submit" variant="primary">Zmodyfikuj</b-button>
          <b-button type="reset" variant="danger">Usuń</b-button>
        </b-form>
        <b-card class="mt-3" header="Form Data Result">
          <pre class="m-0">{{ form }}</pre>
        </b-card>
      </div>
    </b-modal>
    <b-modal v-model="modalShow">
      <h1>Tabela reaktywna VUE</h1>
      <b-container>
        <!-- Kontener Bootstrap-->
        <b-form-group horizontal label="Filtrowanie tabeli" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Czego szukasz?" />
          </b-input-group>
        </b-form-group>
        <template>
          <b-table striped hover :items="items" :fields="fields" :filter="filter" @row-clicked="rowClickHandler">
          </b-table>
        </template>
      </b-container>
    </b-modal>
  </div>
  <script src="script.js"></script>
</body>

</html>