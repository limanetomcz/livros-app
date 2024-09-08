<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use PHPJasper\PHPJasper;

class ReportController extends Controller
{
    public function generateReport()
    {
        $input = resource_path('reports/Livros.jasper');
        $output = storage_path('app/reports/relatorio_temp');
        $options = [
            'format' => ['pdf'],
            'locale' => 'pt_BR',
            'params' => [],
            'db_connection' => [
                'driver' => 'mysql',
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'host' => env('DB_HOST'),
                'database' => env('DB_DATABASE'),
                'port' => env('DB_PORT')
            ]
        ];

        $jasper = new PHPJasper();

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        $pdfFile = $output . '/Livros.pdf';

        if (file_exists($pdfFile)) {
            return response()->file($pdfFile)->deleteFileAfterSend(true);
        } else {
            return response()->json(['message' => 'Erro ao gerar relatório'], 500);
        }
    }

    public function compileReport()
    {
        $input = resource_path('reports/Livros.jrxml');

        $output = resource_path('reports');

        $jasper = new PHPJasper();

        try {
            $jasper->compile($input, $output)->execute();

            return response()->json(['message' => 'Compilação bem-sucedida!', 'output' => $output], 200);
        } catch (QueryException $e) {
            Log::error('Erro de banco de dados: ' . $e->getMessage());
            return response()->json(['error' => 'Erro no banco de dados ao gerar o relatório.'], 500);
        } catch (FileNotFoundException $e) {
            Log::error('Arquivo não encontrado: ' . $e->getMessage());
            return response()->json(['error' => 'Relatório não encontrado ou não foi gerado.'], 404);
        } catch (Exception $e) {
            Log::error('Erro ao gerar relatório: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao gerar o relatório.'], 500);
        }
    }
}
