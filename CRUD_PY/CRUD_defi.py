from tkinter import *
import pymysql


def createdb():
    global titre , description , date_publication,valeur,date_fin 
    afficheTitre = titre.get()
    afficheDesc = description.get()
    afficheval =  valeur.get()
    afficheDate_fin = date_fin.get()
    # Connectez- vous à la base de données.
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',                             
                             db='otra',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
 
    print ( "connexion réussie !")
 
    try:
  
 
        with connection.cursor() as cursor:
       
            # SQL 
            sql = 'Insert into defis (titre , description,valeur ,date_publication,date_fin ) values ("'+afficheTitre+'","'+afficheDesc+'","'+afficheval+'",DATE(NOW()),"'+afficheDate_fin+'") '
            
            # Exécutez la requête (Execute Query).
            cursor.execute(sql)
            connection.commit()
            print ("cursor.description:  ", cursor.description)
 
            print("Les données ont bien été sauvegardées !")
 
            for row in cursor:
                print(row)
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()

def supUser():
    afficheId = id.get()
    
    # Connectez- vous à la base de données.
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',                             
                             db='otra',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
 
    print ("connect successful!!")
 
    try:
  
 
        with connection.cursor() as cursor:
       
            # SQL 
            sql = 'DELETE from defis where defisID  ="'+afficheId+'"'
            
            # Exécutez la requête (Execute Query).
            cursor.execute(sql)
            connection.commit()
            print ("cursor.description:  ", cursor.description)
 
            print("Les données ont bien été sauvegardées !")
 
            for row in cursor:
                print(row)
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()


def updateDb():
    global titre , description , date_publication,valeur,date_fin 
    afficheTitre = titre.get()
    afficheDesc = description.get()
    afficheval =  int(valeur.get())
    afficheDate_fin = date_fin.get()
    # Connectez- vous à la base de données.
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',                             
                             db='otra',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
 
    print ("connect successful!!")
 
    try:
  
 
        with connection.cursor() as cursor:
       
            # SQL 
            sql = 'update  defis (titre , description ,valeur, date_publication, date_fin) values ("'+afficheTitre+'","'+afficheDesc+'",',afficheval,',DATE(NOW()),"'+afficheDate_fin+'") '
            print(sql)
            # Exécutez la requête (Execute Query).
            cursor.execute(sql)
            connection.commit()
            print ("cursor.description:  ", cursor.description)
 
            print("Les données ont bien été sauvegardées !")
 
            for row in cursor:
                print(row)
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()
def readDb() :
    # Connectez- vous à la base de données.
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',                             
                             db='otra',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
 
 
    try:
  
 
        with connection.cursor() as cursor:
       
            # SQL 
            sql = 'select * From defis'
            
            # Exécutez la requête (Execute Query).
            cursor.execute(sql)
            while True:
                record=cursor.fetchone()
                if record==None:
                    break
                print (record,'\n')
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()

def readupDb1() :
    infoDefi = id.get()
    # Connectez- vous à la base de données.
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',                             
                             db='otra',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
 
    print ("readupDB1!!")
 
    try:
  
 
        with connection.cursor() as cursor:
       
            # SQL 
            sqlr = 'select titre,description,valeur,date_publication,date_fin From defis where defisID  = "'+infoDefi+'"'
            
            # Exécutez la requête (Execute Query).
            cursor.execute(sqlr)
            for row in cursor:
                print(row)
            Modifier2();
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()

def readupDb2() :
    infodefi = id.get()
    radiochange = v0.get()
    changeval = chg.get()
    # Connectez- vous à la base de données.
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',                             
                             db='otra',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
 
    print ("readupDB2!!")
    print(radiochange)
    try:
  
 
        with connection.cursor() as cursor:
       
            # SQL 
            sqlu = 'update defis set '+radiochange +' = "'+changeval+'" where defisID  = "'+infodefi+'" '
            print(sqlu)
            # Exécutez la requête (Execute Query).
            cursor.execute(sqlu)
            connection.commit()
            for row in cursor:
                print(row)
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()

def Creer() :
    
    global titre , description ,valeur,date_publication,date_fin
    
    window=Tk()
    lbltitre=Label(window, text="Titre", fg='black', font=("Helvetica", 12))
    lbltitre.place(x=10, y=40)
    titre = Entry(window, text="Saisissez le titre", bd=5)
    titre.place(x=150, y=40)

    lbldescription=Label(window, text="Description", fg='black', font=("Helvetica", 12))
    lbldescription.place(x=10, y=80)
    description=Entry(window, text="Saisissez la description", bd=5)
    description.place(x=150, y=80)

    lblvaleur=Label(window, text="Valeur", fg='black', font=("Helvetica", 12))
    lblvaleur.place(x=10, y=120)
    valeur=Entry(window, text="Saisissez la valeur du defis", bd=5)
    valeur.place(x=150, y=120)

    lbldate_fin=Label(window, text="Date de fin format(année-mois-jour)", fg='black', font=("Helvetica", 12))
    lbldate_fin.place(x=10, y=240)
    date_fin=Entry(window, text="Saisissez la date au format(année-mois-jour)", bd=5)
    date_fin.place(x=150, y=280)

    btn=Button(window, text="Envoyer", fg='black',command=createdb)
    btn.place(x=60, y=300)
                    
    window.title('Infos défis')
    window.geometry("500x400+10+10")
    window.mainloop()
    
def Modifier() :
    global id
    verifID = Tk()
    lblid=Label(verifID, text="ID", fg='black', font=("Helvetica", 12))
    lblid.place(x=60, y=120)
    id=Entry(verifID, text="Saisissez l'id du défi", bd=5)
    id.place(x=150, y=120)
    btn=Button(verifID, text="Envoyer", fg='black',command=readupDb1)
    btn.place(x=60, y=200)
    verifID.geometry("500x400+10+10")
    verifID.mainloop()
    
def Modifier2() :
    
    global  chg, id,v0
    window=Tk()

    lbl=Label(window, text="Veuillez saisir ce que vous voulez modifier :", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=40)
    lbl=Label(window, text="Options disponibles :", fg='black', font=("Helvetica", 12))
    lbl.place(x=80, y=80)
    lbl=Label(window, text="titre,description,date_publication,valeur,date_fin", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=120)
    v0=Entry(window, text="Saisissez votre choix", bd=5)
    v0.place(x=150, y=160)
    

    lblchg=Label(window, text="Valeur de remplacement : ", fg='black', font=("Helvetica", 12))
    lblchg.place(x=60, y=220)
    chg = Entry(window, text="Saisissez la nouvelle valeur", bd=5)
    chg.place(x=150, y=260)
    btn=Button(window, text="Envoyer", fg='black',command=readupDb2)
    btn.place(x=60, y=300)
    window.title('Infos Defis')
    window.geometry("500x400+10+10")
    window.mainloop()

def Supprimer() :

    global id
    verifID = Tk()
    lbl=Label(verifID, text="Veuillez saisir l'id du défi a supprimer :", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=40)
    lblid=Label(verifID, text="ID", fg='black', font=("Helvetica", 12))
    lblid.place(x=60, y=120)
    id=Entry(verifID, text="Saisissez l'id", bd=5)
    id.place(x=150, y=120)
    btn=Button(verifID, text="Envoyer", fg='black',command=Supprimer2)
    btn.place(x=60, y=200)
    verifID.geometry("500x400+10+10")
    verifID.mainloop()
    
def Supprimer2() :
    verifid = Tk()
    lbl=Label(verifid, text="Etes vous sur de vouloir supprimer ce défi ?", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=40)
    
    btn=Button(verifid, text="OUI", fg='black',command=supUser)
    btn.place(x=60, y=200)
    btn=Button(verifid, text="NON(Retour au menu principal)", fg='black',command=choix)
    btn.place(x=160, y=200)
    verifid.geometry("500x400+10+10")
    verifid.mainloop()

def choix() :
    choixdb = Tk()
    Lbl=Label(choixdb)
    choixdb.geometry("200x100")  
    b1 = Button(choixdb,text = "Creer",command=Creer,activeforeground = "red",activebackground = "pink",pady=10)  
      
    b2 = Button(choixdb, text = "Modifier",command=Modifier ,activeforeground = "blue",activebackground = "pink",pady=10)  
      
    b3 = Button(choixdb, text = "Lire",command=readDb,activeforeground = "green",activebackground = "pink",pady = 10)  
      
    b4 = Button(choixdb, text = "Supprimer",command=Supprimer,activeforeground = "yellow",activebackground = "pink",pady = 10)  
      
    b1.pack(side = LEFT)  
      
    b2.pack(side = RIGHT)  
      
    b3.pack(side = TOP)  
      
    b4.pack(side = BOTTOM)
    choixdb.title('Defis')
    choixdb.mainloop()
choix();
