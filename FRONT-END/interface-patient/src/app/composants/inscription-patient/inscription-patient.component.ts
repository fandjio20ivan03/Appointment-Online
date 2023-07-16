import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators, FormControl, AbstractControl, ValidationErrors } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthentificationService } from 'src/app/services/authentification.service';

@Component({
  selector: 'app-inscription-patient',
  templateUrl: './inscription-patient.component.html',
  styleUrls: ['./inscription-patient.component.scss'],
})
export class InscriptionPatientComponent implements OnInit {
  public formGroup: FormGroup;

  constructor(
    private authentificationService: AuthentificationService,
    private fb: FormBuilder,
    private route: Router
  ) {}

  ngOnInit(): void {
    this.formGroup = this.fb.group({
      login: ['', [Validators.required, Validators.minLength(3), Validators.maxLength(100)]],
      password: ['', [Validators.required, Validators.minLength(5)]],
      pat_nom: ['', [Validators.required, Validators.minLength(3), Validators.maxLength(100)]],
      pat_prenom: ['', [Validators.required, Validators.minLength(3), Validators.maxLength(100)]],
      pat_ville: ['', [Validators.required]],
      pat_dateNais: ['', [Validators.required, Validators.pattern('^(0[1-9]|1[0-9]|2[0-9]|3[0-1])/(0[1-9]|1[0-2])/\\d{4}$')]],
      pat_tel: ['', [Validators.required, this.phoneValidator]],
      type: new FormControl(0),

    });
  }

  public onSubmit() {
    if (this.formGroup.valid) {
      const data = this.formGroup.value;
      console.log('Données du patient : ', data);

      this.authentificationService.register(data).subscribe(
        (response: any) => {
          console.log(response);
          this.route.navigate([''])
          this.formGroup.reset();
        },
        (error: any) => {
          console.log(error);
        }
      );
    }
  }


  phoneValidator(control: AbstractControl): ValidationErrors | null {
    const value = control.value;
    if (!value) return null;

    const validLength = value.length === 9;
    const validStart = value.startsWith('67') || value.startsWith('69') || value.startsWith('65');
    const validNextDigit = !value.startsWith('65') || ['3', '4'].includes(value[2]);

    if (validLength && validStart && validNextDigit) return null;

    return { invalidPhone: true };
  }
}






// import { Component, OnInit } from '@angular/core';
// import {
//   FormBuilder,
//   FormControl,
//   FormGroup,
//   Validators,
// } from '@angular/forms';
// import { Router } from '@angular/router';

// import { AuthentificationService } from 'src/app/services/authentification.service';

// @Component({
//   selector: 'app-inscription-patient',
//   templateUrl: './inscription-patient.component.html',
//   styleUrls: ['./inscription-patient.component.scss'],
// })
// export class InscriptionPatientComponent implements OnInit {
//   public formGroup: FormGroup;

//   constructor(
//     private authentificationService: AuthentificationService,
//     private fb: FormBuilder,
//     private route: Router
//   ) {}

//   ngOnInit(): void {
//     // On initialise le formulaire avec les contrôles et les validateurs
//     this.formGroup = this.fb.group({
//       pat_nom: ['', Validators.required],
//       pat_prenom: ['', Validators.required],
//       pat_dateNais: ['', Validators.required],
//       pat_tel: ['', Validators.required],
//       password: ['', Validators.required],
//       password_confirmation: ['', Validators.required],
//       login: ['', Validators.required],
//       pat_ville: ['', Validators.required],
//       type: new FormControl(0),
//       // type: [0]
//     });
//   }

//   // On soumet le formulaire
//   public onSubmit() {
//     // On vérifie si le formulaire est valide
//     if (this.formGroup.valid) {
//       // On récupère les données du formulaire
//       const data = this.formGroup.value;
//       console.log('Données du patient : ', data);

//       // Appel du service d'inscription
//       this.authentificationService.register(data).subscribe(
//         (response: any) => {
//           console.log(response);
//           // Réinitialisation du formulaire
//           this.route.navigate(['']);
//           this.formGroup.reset();
//         },
//         (error: any) => {
//           console.log(error);
//           // Gérer les erreurs
//         }
//       );
//     }
//   }
// }
