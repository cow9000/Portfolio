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
	POINT _cursor;
	GetCursorPos(&_cursor);
	Sleep(2500);
        INPUT ip;
		// Set up a generic keyboard event.
		ip.type = INPUT_KEYBOARD;
		ip.ki.wScan = 0; // hardware scan code for key
		ip.ki.time = 0;
		ip.ki.dwExtraInfo = 0;
        int i = 0;
	while (true) {
        GetCursorPos(&_cursor);
		if (_cursor.y < 600) {
            mouse_event(MOUSEEVENTF_LEFTDOWN, 0, 0, 0, 0);
            Sleep(3);
            mouse_event(MOUSEEVENTF_LEFTUP, 0, 0, 0, 0);
            i++;
            if(i > 2500){
                ip.ki.wVk = 0x34; // virtual-key code for the "a" key
                ip.ki.dwFlags = 0; // 0 for key press
                SendInput(1, &ip, sizeof(INPUT));

                // Release the "A" key
                ip.ki.dwFlags = KEYEVENTF_KEYUP; // KEYEVENTF_KEYUP for key release
                SendInput(1, &ip, sizeof(INPUT));
                i = 0;
            }
            
        }
	}
	return 0;
}