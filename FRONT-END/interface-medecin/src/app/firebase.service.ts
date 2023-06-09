import { Injectable } from '@angular/core';
// import { AngularFireDatabase } from '@angular/fire/database';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class FirebaseService {

  constructor(private db: AngularFireDatabase) { }

  getMedecins(): Observable<any[]> {
    // retourne un observable des médecins depuis la base de données
    return this.db.list('medecins').valueChanges();
  }

  getPatients(): Observable<any[]> {
    // retourne un observable des patients depuis la base de données
    return this.db.list('patients').valueChanges();
  }

  getRendezVous(): Observable<any[]> {
    // retourne un observable des rendez-vous depuis la base de données
    return this.db.list('rendez-vous').valueChanges();
  }

  addRendezVous(rendezVous: any) {
    // ajoute un rendez-vous à la base de données
    this.db.list('rendez-vous').push(rendezVous);
  }

  updateMedecin(medecin: any) {
    // met à jour les données d'un médecin dans la base de données
    this.db.object('medecins/' + medecin.id).update(medecin);
  }

}
