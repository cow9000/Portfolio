#include<windows.h>
#include<stdio.h>
#include<iostream>

void MouseMove(int x, int y)
{
	double fScreenWidth = ::GetSystemMetrics(SM_CXSCREEN) - 1;
	double fScreenHeight = ::GetSystemMetrics(SM_CYSCREEN) - 1;
	double fx = x*(65535.0f / fScreenWidth);
	double fy = y*(65535.0f / fScreenHeight);
	INPUT  Input = { 0 };
	Input.type = INPUT_MOUSE;
	Input.mi.dwFlags = MOUSEEVENTF_MOVE | MOUSEEVENTF_ABSOLUTE;
	Input.mi.dx = fx;
	Input.mi.dy = fy;
	::SendInput(1, &Input, sizeof(INPUT));
}

int main(int argc, char** argv)
{
	Sleep(2500);
	FARPROC pGetPixel;
	HINSTANCE _hGDI = LoadLibrary("gdi32.dll");
	pGetPixel = GetProcAddress(_hGDI, "GetPixel");
	HDC _hdc = GetDC(NULL);
	POINT _cursor;
	GetCursorPos(&_cursor);
	MouseMove(110, 61);
	HWND hWnd = GetDesktopWindow();
	Sleep(2500);
	while (true) {
		GetCursorPos(&_cursor);
		if (_cursor.y < 500) {

			// This structure will be used to create the keyboard
			// input event.
			INPUT ip;

			// Pause for 5 seconds.
			// ENTER key down
			keybd_event(VK_RETURN, 0x9C, 0, 0);
			//Sleep(10);
			// ENTER key up
			keybd_event(VK_RETURN, 0x9C, KEYEVENTF_KEYUP, 0);


			// Set up a generic keyboard event.
			ip.type = INPUT_KEYBOARD;
			ip.ki.wScan = 0; // hardware scan code for key
			ip.ki.time = 0;
			ip.ki.dwExtraInfo = 0;

			// Press the "A" key
			ip.ki.wVk = 0x51; // virtual-key code for the "a" key
			ip.ki.dwFlags = 0; // 0 for key press
			SendInput(1, &ip, sizeof(INPUT));

			// Release the "A" key
			ip.ki.dwFlags = KEYEVENTF_KEYUP; // KEYEVENTF_KEYUP for key release
			SendInput(1, &ip, sizeof(INPUT));
			std::cout << "SENT KEY" << std::endl;
		}
	}
	return 0;
}

/*#include<windows.h>
#include<stdio.h>
#include<iostream>

void MouseMove(int x, int y)
{
double fScreenWidth = ::GetSystemMetrics(SM_CXSCREEN) - 1;
double fScreenHeight = ::GetSystemMetrics(SM_CYSCREEN) - 1;
double fx = x*(65535.0f / fScreenWidth);
double fy = y*(65535.0f / fScreenHeight);
INPUT  Input = { 0 };
Input.type = INPUT_MOUSE;
Input.mi.dwFlags = MOUSEEVENTF_MOVE | MOUSEEVENTF_ABSOLUTE;
Input.mi.dx = fx;
Input.mi.dy = fy;
::SendInput(1, &Input, sizeof(INPUT));
}

int main(int argc, char** argv)
{
Sleep(2500);
FARPROC pGetPixel;
HINSTANCE _hGDI = LoadLibrary("gdi32.dll");
pGetPixel = GetProcAddress(_hGDI, "GetPixel");
HDC _hdc = GetDC(NULL);
POINT _cursor;
GetCursorPos(&_cursor);
MouseMove(110, 61);
HWND hWnd = GetDesktopWindow();
Sleep(2500);
while (true) {
Sleep(500);
mouse_event(MOUSEEVENTF_LEFTDOWN, 0, 0, 0, 0);
Sleep(50);
mouse_event(MOUSEEVENTF_LEFTUP, 0, 0, 0, 0);
GetCursorPos(&_cursor);
std::cout << "X:" << _cursor.x << std::endl;
std::cout << "Y:" << _cursor.y << std::endl;
if (_cursor.y == 61) {
Sleep(250);
MouseMove(473, 61);
mouse_event(MOUSEEVENTF_RIGHTDOWN, 0, 0, 0, 0);
Sleep(50);
mouse_event(MOUSEEVENTF_RIGHTUP, 0, 0, 0, 0);
Sleep(150);
MouseMove(560, 61);
Sleep(50);
mouse_event(MOUSEEVENTF_RIGHTDOWN, 0, 0, 0, 0);
Sleep(50);
mouse_event(MOUSEEVENTF_RIGHTUP, 0, 0, 0, 0);
Sleep(50);
mouse_event(MOUSEEVENTF_LEFTDOWN, 0, 0, 0, 0);
Sleep(50);
mouse_event(MOUSEEVENTF_LEFTUP, 0, 0, 0, 0);
FreeLibrary(_hGDI);
}
}
return 0;
}*/