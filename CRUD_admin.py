from tkinter import *
import pymysql
import bcrypt


def createdb():
    global nom , prenom ,mdp,mail
    afficheNom = nom.get()
    affichePrenom = prenom.get()
    afficheMdp = mdp.get().encode("utf-8")
    hashed = bcrypt.hashpw(afficheMdp, bcrypt.gensalt())
    afficheEmail = mail.get()
    
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
            sql = 'Insert into admin (nom, prenom,mdp,email) values ("'+afficheNom+'","'+affichePrenom+'","'+hashed.decode("utf-8")+'","'+afficheEmail+'") '
            
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
    afficheEmail = mail.get()
    
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
            sql = 'DELETE from admin where email ="'+afficheEmail+'"'
            
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
            sql = 'update admin (nom, prenom) values ("'+afficheNom+'","'+affichePrenom+'") '
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
            sql = 'select * From admin'
            
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
    infoClient = mail.get()
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
            sqlr = 'select nom, prenom, email From admin where email = "'+infoClient+'"'
            
            # Exécutez la requête (Execute Query).
            cursor.execute(sqlr)
            for row in cursor:
                print(row)
            Modifier2();
             
    finally:
        # Closez la connexion (Close connection).      
        connection.close()

def readupDb2() :
    infoClient = mail.get()
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
            sqlu = 'update admin set '+radiochange +' = "'+changeval+'" where email = "'+infoClient+'" '
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
    
    global nom , prenom ,mdp,mail
    
    window=Tk()
    lblnom=Label(window, text="Nom", fg='black', font=("Helvetica", 12))
    lblnom.place(x=60, y=40)
    nom = Entry(window, text="Saisissez votre nom", bd=5)
    nom.place(x=150, y=40)

    lblprenom=Label(window, text="Prénom", fg='black', font=("Helvetica", 12))
    lblprenom.place(x=60, y=80)
    prenom=Entry(window, text="Saisissez votre prénom", bd=5)
    prenom.place(x=150, y=80)

    lblemail=Label(window, text="Email", fg='black', font=("Helvetica", 12))
    lblemail.place(x=60, y=120)
    mail=Entry(window, text="Saisissez votre email", bd=5)
    mail.place(x=150, y=120)

    lblpassw=Label(window, text="password", fg='black', font=("Helvetica", 12))
    lblpassw.place(x=60, y=160)
    mdp=Entry(window, text="Saisissez votre mdp", bd=5)
    mdp.place(x=150, y=160)


    btn=Button(window, text="Envoyer", fg='black',command=createdb)
    btn.place(x=60, y=300)
                    
    window.title('Vos Informations')
    window.geometry("500x400+10+10")
    window.mainloop()
    
def Modifier() :
    global mail
    verifmail = Tk()
    lblemail=Label(verifmail, text="Email", fg='black', font=("Helvetica", 12))
    lblemail.place(x=60, y=120)
    mail=Entry(verifmail, text="Saisissez votre email", bd=5)
    mail.place(x=150, y=120)
    btn=Button(verifmail, text="Envoyer", fg='black',command=readupDb1)
    btn.place(x=60, y=200)
    verifmail.geometry("500x400+10+10")
    verifmail.mainloop()
    
def Modifier2() :
    
    global  chg, mail,v0
    window=Tk()

    lbl=Label(window, text="Veuillez saisir ce que vous voulez modifier :", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=40)
    lbl=Label(window, text="Options disponibles :", fg='black', font=("Helvetica", 12))
    lbl.place(x=80, y=80)
    lbl=Label(window, text="nom , prenom", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=120)
    v0=Entry(window, text="Saisissez votre choix", bd=5)
    v0.place(x=150, y=160)
    

    lblchg=Label(window, text="Valeur de remplacement : ", fg='black', font=("Helvetica", 12))
    lblchg.place(x=60, y=220)
    chg = Entry(window, text="Saisissez la nouvelle valeur", bd=5)
    chg.place(x=150, y=260)
    btn=Button(window, text="Envoyer", fg='black',command=readupDb2)
    btn.place(x=60, y=300)
    window.title('Vos Informations')
    window.geometry("500x400+10+10")
    window.mainloop()

def Supprimer() :

    global mail
    verifmail = Tk()
    lbl=Label(verifmail, text="Veuillez saisir le mail du compte a supprimer :", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=40)
    lblemail=Label(verifmail, text="Email", fg='black', font=("Helvetica", 12))
    lblemail.place(x=60, y=120)
    mail=Entry(verifmail, text="Saisissez l'email", bd=5)
    mail.place(x=150, y=120)
    btn=Button(verifmail, text="Envoyer", fg='black',command=Supprimer2)
    btn.place(x=60, y=200)
    verifmail.geometry("500x400+10+10")
    verifmail.mainloop()
    
def Supprimer2() :
    verifmail = Tk()
    lbl=Label(verifmail, text="Etes vous sur de vouloir supprimer ce client ?", fg='black', font=("Helvetica", 12))
    lbl.place(x=60, y=40)
    
    btn=Button(verifmail, text="OUI", fg='black',command=supUser)
    btn.place(x=60, y=200)
    btn=Button(verifmail, text="NON(Retour au menu principal)", fg='black',command=choix)
    btn.place(x=160, y=200)
    verifmail.geometry("500x400+10+10")
    verifmail.mainloop()

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
    choixdb.mainloop()
choix();
