return redirect()->route('home')->with('info', 'Selamat, Kamu Lulus!');

// atau

return redirect()->back()->with('info', 'Oops... Saldo Kamu Kurang!');

