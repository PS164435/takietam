%----LAB2-----
%---ZROB-PRZEKSZTALCENIE-LINIOWE-NAJTRUDNIEJSZY-PRZYKLAD-NA-KOLOKWIUM
%--Zadanie1---

plaza_unit8 = imread('plaza1.png');
plaza_dbl = double(plaza_unit8);

[rows, cols, channels] = size(plaza_dbl);

czerwony = zeros(rows, cols, channels);

%for row = 1 : rows
%  for col = 1: cols
%    for channel = 1: channels
%      czerwony(row, col, channel);
%    end;
%  end;
%end;
%test
tmp = plaza_dbl;

plaza_dbl(:,:,3) = plaza_dbl(:,:,1);
plaza_dbl(:,:,1) = tmp(:,:,3);
%imshow(plaza_dbl/255);

%---Zadanie2----

plaza2 = tmp;

vectorR = vec(plaza2(:,:,1));
vectorG = vec(plaza2(:,:,2));
vectorB = vec(plaza2(:,:,3));


figure;

subplot(2, 2, 1);
hist(vec(plaza2),100);
title('R+G+B');

subplot(2, 2, 2);
hist(vectorR,100, "r");
title('R');

subplot(2, 2, 3);
hist(vectorG,100, "g");
title('G');

subplot(2, 2, 4);
hist(vectorB,100, "b");
title('B');


%imshow(plaza2/255);

%----Zadanie3----

%---minimalna_wartosc_pikesli

zadanie3 = imread('plaza1.png');
original = double(zadanie3);

min_pixel_value = min(original(:));
max_pixel_value = max(original(:));

przeskalowane = (original - min_pixel_value) / (max_pixel_value - min_pixel_value) * 255;

%----Porownanie dwoch zdjec
subplot(1, 2, 1);
imshow(original /255);
title('Przed');

subplot(1, 2, 2);
imshow(przeskalowane /255);
title('Po');

vectorR1 = vec(original(:,:,1));
vectorG1 = vec(original(:,:,2));
vectorB1 = vec(original(:,:,3));

vectorR2 = vec(przeskalowane(:,:,1));
vectorG2 = vec(przeskalowane(:,:,2));
vectorB2 = vec(przeskalowane(:,:,3));

%-----Histogram dla oryginalu
figure;

subplot(2, 2, 1);
hist(vec(original),100);
title('R+G+B');

subplot(2, 2, 2);
hist(vectorR1,100, "r");
title('R');

subplot(2, 2, 3);
hist(vectorG1,100, "g");
title('G');

subplot(2, 2, 4);
hist(vectorB1,100, "b");
title('B');

%-----Histogram-dla-przeskalowanego
%figure;

%subplot(2, 2, 1);
%hist(vec(przeskalowane),100);
%title('R+G+B');

%subplot(2, 2, 2);
%hist(vectorR2,100, "r");
%title('R');

%subplot(2, 2, 3);
%hist(vectorG2,100, "g");
%title('G');

%subplot(2, 2, 4);
%hist(vectorB2,100, "b");
%title('B');

%-----ZADANIE4------------

%-Teraz-trzeba-zrobic-to-samo-co-w-poprzedni-tylo-ze-z-kazdym-kolorem-osobno

% Rozdziel obraz na składowe kolorów
red_channel = original(:, :, 1);
green_channel = original(:, :, 2);
blue_channel = original(:, :, 3);


% CZERWONY
min_red = min(red_channel(:));
max_red = max(red_channel(:));

scaled_red_channel = (red_channel - min_red) / ((max_red - min_red));

% ZIELONY

min_green = min(green_channel(:));
max_green = max(green_channel(:));

scaled_green_channel = (green_channel - min_green) / ((max_green - min_green));

% NIEBIESKI

min_blue = min(blue_channel(:));
max_blue = max(blue_channel(:));

scaled_blue_channel = (blue_channel - min_blue) / ((max_blue - min_blue));


% Skladanie obrazu w calosc

skladak = cat(3, scaled_red_channel, scaled_green_channel, scaled_blue_channel);

% Wyświetl obraz i histogramy dla każdej składowej koloru
figure;

subplot(2, 2, 1);
imshow(original/255 );
title('Oryginalny obraz');

subplot(2, 2, 2);
imshow(skladak);
title('Obraz po rozciągnięciu histogramu');

vectorR3 = vec(skladak(:,:,1));
vectorG3 = vec(skladak(:,:,2));
vectorB3 = vec(skladak(:,:,3));

%-----Histogram-dla-przeskalowanego
figure;

subplot(2, 2, 1);
hist(vec(skladak),100);
title('R+G+B');

subplot(2, 2, 2);
hist(vectorR3,100, "r");
title('Rp');

subplot(2, 2, 3);
hist(vectorG3,100, "g");
title('Gp');

subplot(2, 2, 4);
hist(vectorB3,100, "b");
title('Bp');

% Zadanie5

% Wartosci do przeskalowanie

red_values = red_channel(:);
green_values = green_channel(:);
blue_values = blue_channel(:);

% liczenie decyli
decile_1 = round(prctile(red_values, 10));
decile_9 = round(prctile(red_values, 90));

scaled_red_channel1 = red_channel;
scaled_red_channel1(scaled_red_channel1 < decile_1) = 0;
scaled_red_channel1(scaled_red_channel1 > decile_9) = 255;
scaled_red_channel1(scaled_red_channel1 >= decile_1 & scaled_red_channel1 <= decile_9) = ...
    ((scaled_red_channel1(scaled_red_channel1 >= decile_1 & scaled_red_channel1 <= decile_9) - decile_1) ...
    / (decile_9 - decile_1) * 255);

%%%%%%%%%%%%%%%%%%%%%%%%%%

decile_1 = round(prctile(green_values, 10));
decile_9 = round(prctile(green_values, 90));

scaled_green_channel1 = green_channel;
scaled_green_channel1(scaled_green_channel1 < decile_1) = 0;
scaled_green_channel1(scaled_green_channel1 > decile_9) = 255;
scaled_green_channel1(scaled_green_channel1 >= decile_1 & scaled_green_channel1 <= decile_9) = ...
    ((scaled_green_channel1(scaled_green_channel1 >= decile_1 & scaled_green_channel1 <= decile_9) - decile_1) ...
    / (decile_9 - decile_1) * 255);

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

decile_1 = round(prctile(blue_values, 10));
decile_9 = round(prctile(blue_values, 90));

scaled_blue_channel1 = blue_channel;
scaled_blue_channel1(scaled_blue_channel1 < decile_1) = 0;
scaled_blue_channel1(scaled_blue_channel1 > decile_9) = 255;
scaled_blue_channel1(scaled_blue_channel1 >= decile_1 & scaled_blue_channel1 <= decile_9) = ...
    ((scaled_blue_channel1(scaled_blue_channel1 >= decile_1 & scaled_blue_channel1 <= decile_9) - decile_1) ...
    / (decile_9 - decile_1) * 255);

scaled_image = cat(3, scaled_red_channel1, scaled_green_channel1, scaled_blue_channel1);
reddd = vec(scaled_image(:,:,1));
figure;

subplot(2, 2, 1);
imshow(original /255);
title('Oryginalny obraz');

subplot(2, 2, 2);
imshow(scaled_image /255);
title('Obraz po rozciągnięciu histogramu z usuwaniem ogona');

subplot(2, 2, 3);
hist(vectorR1,100, "r");
title('Histogram kanału czerwonego (oryginał)');

subplot(2, 2, 4);
hist(reddd,100, "r");
title('Histogram kanału czerwonego (po rozciągnięciu)');
