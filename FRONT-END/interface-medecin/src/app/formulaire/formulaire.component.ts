// // import { Component } from '@angular/core';

// // @Component({
// //   selector: 'app-formulaire',
// //   templateUrl: './formulaire.component.html',
// //   styleUrls: ['./formulaire.component.scss']
// // })
// // export class FormulaireComponent {

// // }

// import { Component, OnInit } from '@angular/core';
// import { FormBuilder, FormGroup, Validators } from '@angular/forms';

// @Component({
//   selector: 'app-formulaire',
//   templateUrl: './formulaire.component.html',
//   styleUrls: ['./formulaire.component.scss']
// })
// export class FormulaireComponent implements OnInit {
//   form: FormGroup;

//   constructor(private fb: FormBuilder) { }

//   ngOnInit(): void {
//     this.form = this.fb.group({
//       nom: ['', Validators.required],
//       prenom: ['', Validators.required],
//       email: ['', Validators.email],
//       telephone: ['', Validators.pattern(/^\d{10}$/)],
//       date: ['', Validators.required],
//       heure: ['', Validators.required]
//     });
//   }

//   onSubmit() {
//     // à compléter avec la logique pour envoyer les données du formulaire à la base de données et attribuer le rendez-vous au médecin
//   }

// }
