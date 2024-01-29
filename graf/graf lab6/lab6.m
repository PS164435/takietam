figure
r = double(imread('rzeczka.jpg'));
imshow(r/255)

%zad1
a = [23,24,25;33,34,35;63,64,65;73,74,75];
maska = [0,0.2,0;0.3,0.4,0;0,0,0.1];
xd = zasmaske(a,maska);
xd

%zad2
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
maska = [5,6,5;6,6,6;5,6,5];
maska./=sum(sum(maska)); % normalizacja maski
xd = zasmaske(r,maska);
imshow(xd/255);

%zad3
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
maska = [0,-1,0;-1,5,-1;0,-1,0];
xd = zasmaske(r,maska);
function wejscie = PrzytnijZakres(wejscie)
wejscie(wejscie < 0) = 0;
wejscie(wejscie > 255) = 255;
end
xd = PrzytnijZakres(xd);
imshow(xd/255);

%zad4
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
maska = [0,0,0;-1,0,1;0,0,0];
function wyjscie = SzaroscSrednia (r,g,b)
wyjscie = (r+g+b)/3;
end
r2 = SzaroscSrednia (r(:,:,1),r(:,:,2),r(:,:,3));
imshow(r2/255);
r3 = zasmaske(r2,maska);
r4 = abs(r3); % chyba moduł ale nie jestem pewien
imshow(r4/255);

%zad5
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
maska = [-1,-2,-1;0,0,0;1,2,1];
r2 = abs(zasmaske(r,maska));
imshow(r2/255);

%zad6
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
function wyjscie = SzaroscSrednia (r,g,b)
wyjscie = (r+g+b)/3;
end
r2 = SzaroscSrednia (r(:,:,1),r(:,:,2),r(:,:,3));
imshow(r2/255);
a = [0,-1,0;0,0,0;0,1,0];
b = [0,0,0;1,0,-1;0,0,0];
obr1 = abs(zasmaske(r,a));
obr2 = abs(zasmaske(r,b));
obrw = max(obr1,obr2);
imshow(obrw/255);

%zad7
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
a = [-1,-1,0;-1,0,1;0,1,1];
function wyjscie = SzaroscSrednia (r,g,b)
wyjscie = (r+g+b)/3;
end
r2 = SzaroscSrednia (r(:,:,1),r(:,:,2),r(:,:,3));
r3 = zasmaske(r2,a);
r3+=127.5;
imshow(r3/255);

%zad8
figure
r = double(imread('rzeczka.jpg'));
imshow(r/255);
a = [-1,-sqrt(2),-1;0,0,0;1,sqrt(2),1];
b = [-1,0,1;-sqrt(2),0,sqrt(2);-1,0,1];
r2 = (r(:,:,1)+r(:,:,2)+r(:,:,3))/3;
obr1 = abs(zasmaske(r2,a));
obr2 = abs(zasmaske(r2,b));
img3 = sqrt(obr1.^2 + obr2.^2);
imshow(img3/255); % wychodzi nieco inny obrazek



