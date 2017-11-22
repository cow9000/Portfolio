#include <iostream>
#include <stdio.h>
#include <windows.h>
#include "headers/text.h"

int main(){
    FARPROC pGetPixel;
	HINSTANCE _hGDI = LoadLibrary("gdi32.dll");
	pGetPixel = GetProcAddress(_hGDI, "GetPixel");
	HDC _hdc = GetDC(NULL);
    HWND hWnd = GetDesktopWindow();
    
    for(int x = 0; x < 100; x++){
        for(int y = 0; y < 100; y++){
            COLORREF _color = (*pGetPixel) (_hdc, x, y);
            int _red = GetRValue(_color);
            int _green = GetGValue(_color);
            int _blue = GetBValue(_color);

            printf("Red: 0x%02x\n", _red);
            printf("Green: 0x%02x\n", _green);
            printf("Blue: 0x%02x\n", _blue);
        }
    }
    //Free memory
    FreeLibrary(_hGDI);
}