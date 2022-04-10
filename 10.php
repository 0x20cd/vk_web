<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>10</title>
</head>
<body>
	<style type="text/css">
		button#btnnav {
			margin: 10px;
			padding-left: 15px;
			padding-right: 15px;
			font-size: 14pt;
		}

		span#price {
			font-size: 12pt;
			font-style: italic
		}
	</style>
	<script type="text/javascript" src="https://unpkg.com/vue@3"></script>

	<h1>Товары / Вездекод</h1>

	<div id="app">
		<h2>{{ name }}</h2>
		<img v-bind:src="img"><br>
		<span id="price">{{price}} баллов</span><br>
		<button id="btnnav" @click="prev"><<</button>
		<button id="btnnav" @click="next">>></button>
	</div>

	<script>
		<?php
			$file = fopen("prod.json", "r");
			echo "prod = ";
			echo str_replace("\n", "", fread($file, filesize("prod.json")));
			echo ";";
			fclose($file);
		?>
		var id = 0;

		Vue.createApp({
			data() {
				return {
					name : prod[id]['name'],
					price : prod[id]['price'],
					img : prod[id]['img']
				}
			},

			methods: {
				prev: function() {
					id = (id+prod.length-1)%prod.length;
					this.name = prod[id]['name'];
					this.price = prod[id]['price'];
					this.img = prod[id]['img'];
				},

				next: function() {
					id = (id+1)%prod.length;
					this.name = prod[id]['name'];
					this.price = prod[id]['price'];
					this.img = prod[id]['img'];
				}
			}
		}).mount('#app')
	</script>
</body>
</html>