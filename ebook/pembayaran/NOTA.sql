DROP TABLE PEMBAYARANS;
DROP TABLE NOTAS;
DROP TABLE HARGAS;
DROP TABLE BARANGS;
DROP TABLE SUPPLIERS;

CREATE TABLE  "SUPPLIERS"
   ("KODE_SUPPLIER" VARCHAR2(3),
    "NAMA_SUPPLIER" VARCHAR2(30) CONSTRAINT "NAMA_SUPPLIER_NN" NOT NULL ENABLE,
     CONSTRAINT "KODE_SUPPLIER_PK" PRIMARY KEY ("KODE_SUPPLIER")
  USING INDEX  ENABLE
   );

CREATE TABLE  "BARANGS"
  ( "KODE_BARANG" VARCHAR2(3),
    "NAMA_BARANG" VARCHAR2(20) CONSTRAINT "NAMA_BARANG_NN" NOT NULL ENABLE,
     CONSTRAINT "KODE_BARANG_PK" PRIMARY KEY ("KODE_BARANG")
  USING INDEX  ENABLE
   );

   CREATE TABLE  "HARGAS"
   ("KODE_BARANG" VARCHAR2(3) NOT NULL ENABLE,
    "HARGA_BARANG" NUMBER(20) CONSTRAINT "HARGA_BARANG_NN" NOT NULL ENABLE,
	"TANGGAL_BERLAKU" DATE CONSTRAINT "TANGGAL_BERLAKU_HRG_NN" NOT NULL ENABLE,
     CONSTRAINT "KODE_BARANG_PK" PRIMARY KEY ("KODE_BARANG")
  USING INDEX  ENABLE
   );

ALTER TABLE  "HARGAS" ADD CONSTRAINT "HARGAS_KODE_BARANG_FK" FOREIGN KEY ("KODE_BARANG")
	REFERENCES “BARANGS”  ("KODE_BARANG") ENABLE;

CREATE TABLE  "NOTAS"
   ("NO_NOTA" VARCHAR2(3),
   "KODE_SUPPLIER" VARCHAR2(3) NOT NULL ENABLE,
       "TANGGAL" DATE CONSTRAINT "TANGGAL_NN" NOT NULL ENABLE,
	   "JATUH_TEMPO" DATE CONSTRAINT "JATUH_TEMPO_NN" NOT NULL ENABLE,
	   "TOTAL_FAKTUR" NUMBER(25) CONSTRAINT "TOTAL_FAKTUR_NN" NOT NULL ENABLE,
    CONSTRAINT "NO_NOTA_PK" PRIMARY KEY ("NO_NOTA") ENABLE
   );


ALTER TABLE  "NOTAS" ADD CONSTRAINT "NOTAS_KODE_SUPPLIER_FK" FOREIGN KEY ("KODE_SUPPLIER")
	REFERENCES  SUPPLIERS ("KODE_SUPPLIER") ENABLE;
	

CREATE TABLE  "PEMBAYARANS"
   ("NO_NOTA" VARCHAR2(3),
    "KODE_BARANG" VARCHAR2(3),
	"QTY" NUMBER(5) CONSTRAINT "QTY_NN" NOT NULL ENABLE,
    "JUMLAH" NUMBER(20) CONSTRAINT "PBAYAR_JUMLAH_NN" NOT NULL ENABLE,
     CONSTRAINT "PBAYAR_PK" PRIMARY KEY ("NO_NOTA", "KODE_BARANG")
  USING INDEX  ENABLE
   );

ALTER TABLE  "PEMBAYARANS" ADD CONSTRAINT "PEMBAYARANS_KODE_BARANG_FK1" FOREIGN KEY ("KODE_BARANG")
      REFERENCES  "BARANGS" ("KODE_BARANG") ENABLE;

ALTER TABLE  "PEMBAYARANS" ADD CONSTRAINT "PEMBAYARANS_NO_NOTA_FK2" FOREIGN KEY ("NO_NOTA")
      REFERENCES  "NOTAS" ("NO_NOTA") ENABLE;
	    

INSERT INTO suppliers (kode_supplier, nama_supplier)
VALUES ('G01','Eka');
INSERT INTO suppliers (kode_supplier, nama_supplier)
VALUES ('G02','Maria');
INSERT INTO suppliers (kode_supplier, nama_supplier)
VALUES ('G03','Ulmi');
INSERT INTO suppliers (kode_supplier, nama_supplier)
VALUES ('G04','Yana');
INSERT INTO suppliers (kode_supplier, nama_supplier)
VALUES ('G05','Erma');


INSERT INTO barangs(kode_barang, nama_barang)
VALUES('A01','LAPTOP ASUS');
INSERT INTO barangs(kode_barang, nama_barang)
VALUES('A02','IPONE X');
INSERT INTO barangs(kode_barang, nama_barang)
VALUES('A03','LAPTOP LENOVO');
INSERT INTO barangs(kode_barang, nama_barang)
VALUES('A04','AC ');
INSERT INTO barangs(kode_barang, nama_barang)
VALUES('A05','KULKAS');


INSERT INTO hargas(kode_barang, harga_barang, tanggal_berlaku)
VALUES('A01',50000,TO_DATE('16-02-2018','mm-dd-yyyy'));
INSERT INTO hargas(kode_barang, harga_barang, tanggal_berlaku)
VALUES('A02',79000,TO_DATE('18-02-2018','mm-dd-yyyy'));
INSERT INTO hargas(kode_barang, harga_barang, tanggal_berlaku)
VALUES('A03',85000,TO_DATE('19-02-2018','mm-dd-yyyy'));
INSERT INTO hargas(kode_barang, harga_barang, tanggal_berlaku)
VALUES('A04',90000,TO_DATE('17-03-2018','mm-dd-yyyy'));
INSERT INTO hargas(kode_barang, harga_barang, tanggal_berlaku)
VALUES('A05',78000,TO_DATE('23-3-2018','mm-dd-yyyy'));


INSERT INTO notas(no_nota,kode_supplier, tanggal, jatuh_tempo, total_faktur)
VALUES('991','A01',TO_DATE('1-01-2018','mm-dd-yyyy'),TO_DATE('4-01-2018','mm-dd-yyyy'),12300000);
INSERT INTO notas(no_nota,kode_supplier, tanggal, jatuh_tempo, total_faktur)
VALUES('992','A02',TO_DATE('3-01-2018','mm-dd-yyyy'),TO_DATE('6-01-2018','mm-dd-yyyy'),1000000);
INSERT INTO notas(no_nota,kode_supplier, tanggal, jatuh_tempo, total_faktur)
VALUES('993','A03',TO_DATE('5-01-2018','mm-dd-yyyy'),TO_DATE('8-01-2018','mm-dd-yyyy'),10350000);
INSERT INTO notas(no_nota,kode_supplier, tanggal, jatuh_tempo, total_faktur)
VALUES('994','A04',TO_DATE('7-01-2018','mm-dd-yyyy'),TO_DATE('10-01-2018','mm-dd-yyyy'),400000);
INSERT INTO notas(no_nota,kode_supplier, tanggal, jatuh_tempo, total_faktur)
VALUES('995','A05',TO_DATE('9-01-2018','mm-dd-yyyy'),TO_DATE('12-01-2018','mm-dd-yyyy'),5000000);


INSERT INTO pembayarans(no_nota, kode_barang,qty, jumlah)
VALUES('991','A01',3,28000);
INSERT INTO pembayarans(no_nota, kode_barang,qty, jumlah)
VALUES('992','A02',1,77000);
INSERT INTO pembayarans(no_nota, kode_barang,qty, jumlah)
VALUES('993','A03',3,12000);
INSERT INTO pembayarans(no_nota, kode_barang,qty, jumlah)
VALUES('994','A04',4,56000);
INSERT INTO pembayarans(no_nota, kode_barang,qty, jumlah)
VALUES('995','A05',5,52000);